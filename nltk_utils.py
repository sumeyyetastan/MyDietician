import nltk # Doğal dil kütüphanesi 
import numpy as np  # train etmek için kullanacağımız 0 ve 1 ler olucak. Bunun içinde python da kullandığımız numpy kütüphensini kullanıyoruz.  
#nltk.download('punkt') #this is a package with a pre-trained tokenizer
from nltk.stem.porter import PorterStemmer #nltk kütüphanesinin içinde bulunan bir diğer modülümüzdür.Burada yaptığımız şey kelimleri köklerine ayırma işlemini yapıyoruz. Kelimemiz hangi eki alırsa alsın kelimemizin kökünü buluyor.
stemmer = PorterStemmer()

def tokenize(sentence): # tokenize modulü için fonksiyon açıyoruz fonksiyonumuz cümle yolluyoruz. Bu fonksiyon sonucunda çıkan sonuç kelime kelime ayırıyoruz.
    return nltk.word_tokenize(sentence)

def stem(word): # Stemmer modulünü kullanarak bir fonskyion daha yazıyoruz. Yazdığımız fonksiyonda kelimelerin kökünü ayırıyoruz.
    return stemmer.stem(word.lower())    

def bag_of_words(tokenized_sentence,all_words):
    """sentence= ["hello","how","are","you"]
       words=["hi","hello","I","you","bye","thank","cool"]
       bag = [0,     1,     0 ,  1 , , 0 ,    0 ,  0]
    """
    tokenized_sentence = [stem(w) for w in tokenized_sentence]
    bag = np.zeros(len(all_words), dtype=np.float32) # her cümle için ilk olarak sıfır veriyoru<
    for idx,w in enumerate(all_words):   # yenilenen cümlelerin ve indexlerin  sayısını tutmamızı sağlar. Döngülerde direk kullanabiliriz ya da list() te kullanabiliriz.Bu kısım bize index ve o anki kelimeyi vericek.
        if w in tokenized_sentence: # eğer kelimemiz ayrılmış olan tokenize sentence daki bir kelime ise kelimenin indexi 1 olucak.
            bag[idx] = 1.0 #idx= index
    return bag




#tokenizer test is working 
#a = "How long does shipping take ? "
#print(a)
#a = tokenize(a)
#print(a)


#stemming test is working
#words =["organize","organizes","organizing"]
#stemmed_words = [ stem(w) for w in words]
#print(stemmed_words)

#sentence = ["hello","how","are","you"]
#words = ["hi","hello","I","you","bye","thank","cool"]
#bag = bag_of_words(sentence,words)
#print(bag)