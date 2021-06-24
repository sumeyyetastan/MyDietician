import random #Rastgele atayacağımız şeyler için kütüphaneyi import ediyoruz.
import json # sözlük olarak oluşturduğumuz dosyanın uzantısını import ediyoruz.
import torch #Kullanacağımız pyTorch kütüphanesini import ediyoruz.
from model import NeuralNet #model.py dosyasından NeuralNet fonksiyonunu import ediyoruz.
from nltk_utils import bag_of_words, tokenize #ntlk_utils.py klasöründen kullanacağımız fonksiyonları import ediyoruz.
import sys #argümanlar için kullanacağımız sys modulünü import ediyoruz.



#GPU için kontrol gerçekleştiriyoruz.
device = torch.device('cuda' if torch.cuda.is_available() else 'cpu')

with open('intents-en.json','r') as f: #json file içinde yazmış olduğumuz tagları ,cümleleri ve cevapları bu kodu kullanarak dosyayı açıyoruz ve okuyoruz .
    intents = json.load(f)  #intents içinde bulunan herşeyi yüklüyoruz. Bu kısmı çalıştırdığımızda terminalde cevapları görebiliyoruz.

FILE = "data-en.pth" 
data = torch.load(FILE) #Nesneleri diske kaydeder.

#data klasörünün içinden bunları çekiyoruz.
input_size = data ["input_size"]
hidden_size = data ["hidden_size"]
output_size = data["output_size"]
all_words = data["all_words"]
tags = data["tags"]
model_state = data["model_state"]

model = NeuralNet(input_size, hidden_size, output_size).to(device)
model.load_state_dict(model_state)
model.eval() #Kendisine verilen karakter dizisini değerlendirir ve bir sonuç verir.


#print("Let's chat! type 'quit! to exit ")

#print("uzunluk  argv : " ,len(sys.argv))

uzunluk = len(sys.argv)

gelensentence = " "
if uzunluk > 0 :
    j=1
for i in range(1,uzunluk):
 
    x = sys.argv[i]
    #print ("Arguman ayrimi : " , x)     
    gelensentence=gelensentence+x 
    gelensentence=gelensentence+" "
#print(gelensentence)
newsentence = gelensentence



sentence = newsentence
#print("while dan sonraki sentence " , sentence)
if sentence == 'quit':
    print("aaa")
    
sentence = tokenize(sentence)
X = bag_of_words(sentence, all_words)
X = X.reshape(1,X.shape[0])
X = torch.from_numpy(X).to(device)

output = model(X)
_, predicted = torch.max(output, dim=1)
tag = tags[predicted.item()]

probs = torch.softmax(output, dim=1)
prob = probs[0][predicted.item()]
if prob.item() > 0.75:
    for intent in intents['intents']:
        if tag == intent["tag"]:
            dosya=open('chat2.txt', 'w')   # dosya erişimi
            satir1 = random.choice(intent['responses'])
            dosya.write(satir1)  # yazdırma işlemi
            dosya.close()  # close fonksiyonu ise dosyanızı kapatmaya yarayan fonksiyondur.

                #dialog = open("abc.txt","a")
                #deger = random.choice(intent['responses'])
                #dialog.write(random.choice(intent['responses']))
            #print(f"{bot_name}: {random.choice(intent['responses'])}")
else:
    dosya=open('chat2.txt', 'w')   # dosya erişimi
    satir2 = "Sorry .I don't understand. "
    dosya.write(satir2)  # yazdırma işlemi
    dosya.close()  # close fonksiyonu ise dosyanızı kapatmaya yarayan fonksiyondur.
    
   
