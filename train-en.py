import numpy as np 
import random # rastgele methodunu kullanabilmek için import ediyoruz.
import json # sözlük olarak oluşturduğumuz dosyanın uzantısını import ediyoruz.

import torch #Kullanacağımız pyTorch kütüphanesini import ediyoruz.
import torch.nn as nn #sinir ağı kullanmak için kullanulan kütüphane
from torch.utils.data import Dataset, DataLoader # CPU kulanmak için ve dataset i oluşturmak için kullanılan kütüpahnedir. 

from nltk_utils import bag_of_words, tokenize, stem # nltk_utils dosyasında yaptığımız fonksiyonları çağırmak için import ediyoruz.
from model import NeuralNet

with open('intents-en.json', 'r') as f:  #json file içinde yazmış olduğumuz tagları ,cümleleri ve cevapları bu kodu kullanarak dosyayı açıyoruz ve okuyoruz .

    intents = json.load(f) #intents içinde bulunan herşeyi yüklüyoruz. Bu kısmı çalıştırdığımızda terminalde cevapları görebiliyoruz.

all_words = [] #boş bir array atıyoruz çünkü birden fazla ve farklı olan patternsleri almamız gerekiyor.
tags = [] # aynı zamanda birden fazla ve farklı taglarımız bulanabilir. Bunun içinde boş array açıyoruz.
xy = [] #Buraya hem patternsleri(cümleleri) hemde tagları aynı anda koyabiliyoruz.

#gelişmiş for kullanıyoruz burada 
for intent in intents['intents']:
    tag = intent['tag']
    
    tags.append(tag)
    for pattern in intent['patterns']:
        
        w = tokenize(pattern) # patterns dediğimiz cümle olarak bizim yazdıklarımız .Bunu tokenize fonksiyonu ile kelime kelime ayırıp w ye atıyoruz.
        
        all_words.extend(w) # oluşturduğumuz boş array in içine işlem yaptığımız her cümleyi atarak birleştiriyoruz. bunun içinde extend kullanıyoruz.
        
        xy.append((w, tag)) # append özelliğini listeye öğeler ekleyebilmek için kullanıyoruz.Burada hem tagları hemde patternsleri ekliyoruz.


ignore_words = ['?', '.', '!'] # kullandığımız özel işaretleri tanmlayarak ( bunları artırabilirizde ) bunları da ayırıyoruz ve kullanıma dahil etmiyoruz.
all_words = [stem(w) for w in all_words if w not in ignore_words] # her cümleyi köklerine ayırıyoruz ve küçük harf yapıyoruz. Bunuda stem fonksiyonu ile gerçekleştiriyoruz.
print(all_words)

all_words = sorted(set(all_words)) # Burada sadece eşsiz olanları yani bir kelimeyi bir  kere kullanarak bir küme içine alıyoruz ve bunları listeliyoruz.
tags = sorted(set(tags)) 

print(len(xy), "patterns") 
print(len(tags), "tags:", tags)
print(len(all_words), "unique stemmed words:", all_words)

#Yapacağımız training işlemine başlıyoruz. 
X_train = [] # x train için boş bir array oluşuturuyoruz. Bu kısımda ise bag of words leri barındırıcak. Yani 0 ve 1 verdiğimiz kısım.
y_train = [] #  y train için boş bir array oluşuturuyoruz. Bu kısım tagsleri barındırıcak.
for (pattern_sentence, tag) in xy: #daha önce xy arrayinde belirlediğimiz patterns ve taglar için bir for döngüsü açıyoruz bunu xy arrayinden çekiyoruz.
 
    bag = bag_of_words(pattern_sentence, all_words) #bag_of_words fonksiyonunu çağırıyoruz. O fonksiyonda yaptığımız şey cümleleri 0 ve 1 olaraka ayırmak.
    #bu fonksiyonda tokenize sentence çağırmamız gerekir. Bunun anlamı pattern_sentence diyoruz zaten biz cümleleri üst kısımda tokenize etmiş sayılıyoruz.
    X_train.append(bag) # eklediğimiz kelimeleri append kullanarak X_traine ekliyoruz.
    
    label = tags.index(tag) #Burada tagleri kullanyoruz. Taglerin indexlerini alıyoruz.
    y_train.append(label) #eklediğimiz tagleri append kullanarak Y_train e ekliyoruz. 7 tags: ['delivery', 'funny', 'goodbye', 'greeting', 'items', 'payments', 'thanks'] bu şekilde örnek verebiliriz. Label delivery için 0 alıcak ,  funny içinde label 1 alıcak. Tüm labeller için numaralarımız bulunacak.

X_train = np.array(X_train) # 
y_train = np.array(y_train) #

#print("x-train" , X_train)

#print("y-train",y_train)

# Hyper-parameters 

batch_size = 8 #Batch size ımızı 2 nin katları şeklinde belirlememiz gerekiyor. Biz çok küçük bir data seti kullanacağımız için küçük bir değer girdik.
input_size = len(X_train[0]) #Neural Network, input layer için bag_of_words kelimelerinin boyutu kadar bir değer atıyoruz
hidden_size = 8 # İstediğimiz değeri verebiliriz. 
input_size = len(X_train[0])
output_size = len(tags) #Output Layer çıkıcak olan değerler taglarımız olucak yani classlarımız. Burada taglarımızın uzunluğu kadar bir değer belirliyoruz.
#print(input_size , len(all_words))
#print(output_size ,tags)
#print(input_size, output_size)
learning_rate =0.001 # öğrenme hızına genel de kullanılan bir değeri giriyoruz.
num_epochs = 1000 # Eğitim adımlarının belirlendiği bir parametredir. Eğitim sayısı arttıkça , başarı sayısıda artacaktır.

#
class ChatDataset(Dataset):

    def __init__(self):
        self.n_samples = len(X_train) #number of samples integer yada array olarak düşünebiliriz.Burada eşitelediğimiz şey X_train e vardiğimiz kelimelerin uzunluğuna eşitliyoruz.
        self.x_data = X_train #bag of words deki kelimeleri alıyor 
        self.y_data = y_train # tagları alıyor 

    #dateset [idx] , datasetin indexlerini alabilmek için ypaılan bir işlemdir.
    def __getitem__(self, index):
        return self.x_data[index], self.y_data[index]

    
    def __len__(self):
        return self.n_samples

#Datasetimizi oluşturmak için fonksiyonumuzu çağırıyoruz.
dataset = ChatDataset()
#train yapmak için hyperparametreleri  kullanıyoruz.Tüm veri kümelerini DataLoader sayresin de yüklüyoruz.
#Hyperparametre kullanımı bize oldukça kolaylık sağlıyor. 
#num_workers : daha hızlı yükleme sağlar.
#shuffle = verileri bölmeden önce karıştır.
train_loader = DataLoader(dataset=dataset,batch_size=batch_size,shuffle=True,num_workers=0)

#Burada kontrol gerçekleştiriyoruz.
device = torch.device('cuda' if torch.cuda.is_available() else 'cpu')
#Neural Net fonksiyonunu çğırıyoruz ve yapay sinir ağları işlemlerine başlıyoruz.
model = NeuralNet(input_size,hidden_size,output_size).to(device)

criterion = nn.CrossEntropyLoss() #Tam olarak emin değilim ama sınıfların doğruluk oranlarını belirler.
optimizer = torch.optim.Adam(model.parameters(), lr=learning_rate)

#Eğitime başlayan kısım burasıdır. Epoch sayısını belirlediğmiz aralıkta alıyoruz ve döngüye sokuyoruz.
for epoch in range(num_epochs):
    for (words, labels) in train_loader:  
        words = words.to(device) 
        labels = labels.to(dtype=torch.long).to(device)
        
        #forward parts 
        outputs = model(words) 
        
        loss = criterion(outputs, labels) # calculate the loss , predicted the outputs and labels
        
        #backward
        optimizer.zero_grad() #ilk başta boş olucak.
        loss.backward() #backpropagation hesaplaması yapılır.
        optimizer.step() 
        
        
    if (epoch+1) % 100 == 0:
        print (f'Epoch [{epoch+1}/{num_epochs}], Loss: {loss.item():.4f}')

print(f'final loss: {loss.item():.4f}')

# Bu bizim sözlüğümüz olucak .
data = {
    "model_state" : model.state_dict(), # Her katmanı kendi parametre sensörüyle eşleyen bir python sözlük nesnesidir.
    "input_size" : input_size,
    "output_size" : output_size,
    "hidden_size" : hidden_size,
    "all_words" : all_words,
    "tags" : tags
}

FILE = "data-en.pth"
torch.save(data,FILE) #Nesneleri diske kaydeder.


print(f'training complete. file saved to {FILE}')