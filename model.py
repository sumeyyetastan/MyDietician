   
import torch #PyTorch kullanmak için kütüphanesi dahil ediyoruz. 
import torch.nn as nn # PyTorch un içinde bulunan neural network kütüphanesini projemize dahil ediyoruz.

#Yapay sinir ağlarının çalışmasını başlatmak için ilk olarak nasıl çalışıtığını anlatmamız gerekirse. Yapay sinir ağları aynı insan beyni öngörülerek yapılmış bir makine öğretmesidir. 
#Yapay sinir ağları katmanlar halinde  bulunmaktadır. ilk katmatan Input(giriş) Layer katmanıdır. Bu katman dışarıdan gelen bilgileri bir sonraki katmana iletir. Peki bir sonraki katman nedir? 
#Hidden (Gizli ) Layer katmandır. Bu katmanda dışarıdan gelen bilgileri belirli hesaplamalar yaparak çıkış düğümlerine aktarılır. Birden fazla gizli katman olabileceği gibi gizli katman olmayadabilir.
#Output(Çıkış) Layer son katmandır. Hidden layerdan gelen hesaplamalar ve ağlar doğrultusunda dış dünyaya bilgilerin aktarılmasından sorumludur.

#Input_size = Input Layer
#hidden_size = Hidden Layer
#num_classes = Output Layer
#Yapay sinir ağlarının yapısını oluşturmak için class açıyoruz. Bu class ın içinde nesne tabanlı programlama bulunuyor.
class NeuralNet(nn.Module):
    def __init__(self, input_size, hidden_size, num_classes):
        super(NeuralNet, self).__init__() #Nesne tabanama da yaptığımız gibi .
        self.l1 = nn.Linear(input_size, hidden_size) # linear layer l1 dediğimizi laye 1 oluyor burada input _size dan hidden_size a yolluyoruz.
        self.l2 = nn.Linear(hidden_size, hidden_size)  #l2 dediğimiz layer2 oluyor hidden_size , hidden_size arasında hesaplamalar yapıyoruz.
        self.l3 = nn.Linear(hidden_size, num_classes)   #l3 dediğimiz layer3 oluyor ve hidden_size dan num_classes a bilgileri aktarıyor.
        self.relu = nn.ReLU() #activation function 
    # we apply these layers 
    def forward(self, x):
        #Burada tuttuğumuz verileri ilk aşamadan geçiyoriyoruz.
        out = self.l1(x)
        #X üzerinden yaptığımız işlemleri doğrusal aktivasyon fonksiyonunu kullanıyoruz.
        out = self.relu(out) #acrtivation function
        out = self.l2(out)
        out = self.relu(out)
        out = self.l3(out)
        # no activation and no softmax at the end
        return out
