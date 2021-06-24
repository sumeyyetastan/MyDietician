from sklearn.model_selection import train_test_split
from sklearn.tree import DecisionTreeClassifier
import numpy as np
import pandas as pd
from sklearn import preprocessing
from sklearn import metrics
from sklearn.preprocessing import StandardScaler
from sklearn.linear_model import LogisticRegression
from sklearn.metrics import confusion_matrix
import statsmodels.api as sm
from sklearn.neighbors import KNeighborsClassifier
from sklearn.ensemble import RandomForestClassifier
from sklearn.svm import SVC
from sklearn.naive_bayes import GaussianNB
from sklearn.tree import DecisionTreeClassifier
import sys
import datetime


""" burada x2 verisi dogruluk oranını etkiledigi için onu  silip tekrar hesap yaptık ama dogruluk oranı degişmedi
bu sebeple farklı metaryelleirn tahmin işlemlerini gerçekleştiricem """

cinsiyet = sys.argv[1]
#print('Kisinin cinsiyeti ', cinsiyet )
dogumTarihi = sys.argv[2]
#print('dogum : ', dogumTarihi )
sehir = sys.argv[3]
#print('Sehir: ', sehir )
kanGrubu=sys.argv[4]
#print('Kan Grubu: ', kanGrubu )
kilo=sys.argv[5]
#print('Kilo : ', kilo )
boy=sys.argv[6]
#print('Boy : ', boy )
hedefKilo=sys.argv[7]
#print('Hedef Kilo : ', hedefKilo )
UserID=sys.argv[8]
#print('User ID : ', UserID )


an = datetime.datetime.now()
bu_yil=an.year
dogum_yili=dogumTarihi[0:4]
#print(dogum_yili)
yas=int(bu_yil)-int(dogum_yili)
#print("yas:",yas)

yas_a=np.array([yas],dtype='i8')
kilo_a=np.array([kilo],dtype='i8')
boy_a=np.array([boy],dtype='i8')


if cinsiyet=='Kadın':
    cinsiyet_a=np.array([1])
    #print(bilgiler_bagimli_cinsiyet)

elif cinsiyet=='Erkek':    
    cinsiyet_a=np.array([0])
    #print(bilgiler_bagimli_cinsiyet)


if sehir =='Akdeniz':
    sehir_a=np.array([1,0,0,0,0,0,0])

elif sehir =='DoguAnadolu':
    sehir_a=np.array([0,1,0,0,0,0,0])

elif sehir =='Ege':
    sehir_a=np.array([0,0,1,0,0,0,0])

elif sehir =='GuneyDoguAnadolu':
    sehir_a=np.array([0,0,0,1,0,0,0]) 

elif sehir =='Karadeniz':
    sehir_a=np.array([0,0,0,0,1,0,0])

elif sehir =='Marmara':
    sehir_a=np.array([0,0,0,0,0,1,0]) 
    
elif sehir =='IcAnadolu':
    sehir_a=np.array([0,0,0,0,0,0,1])      
    
       

if kanGrubu=='0Rh+':
    kanGrubu_a=np.array([1,0,0,0,0,0,0,0])
    #print(bilgiler_bagimli_kangrubu)

elif kanGrubu=='0Rh-':    
    kanGrubu_a=np.array([0,1,0,0,0,0,0,0])
    #print(bilgiler_bagimli_kangrubu)

elif kanGrubu=='ARh+':    
    kanGrubu_a=np.array([0,0,1,0,0,0,0,0])
    #print(bilgiler_bagimli)
    
elif kanGrubu=='ARh-':    
    kanGrubu_a=np.array([0,0,0,1,0,0,0,0])
    #print(bilgiler_bagimli)
        
elif kanGrubu=='ABRh+':    
    kanGrubu_a=np.array([0,0,0,0,1,0,0,0])
    #print(bilgiler_bagimli)

elif kanGrubu=='ABRh-':    
    kanGrubu_a=np.array([0,0,0,0,0,1,0,0])
    #print(bilgiler_bagimli)
        
elif kanGrubu=='BRh+':    
    kanGrubu_a=np.array([0,0,0,0,0,0,1,0])
    #print(bilgiler_bagimli)

elif kanGrubu=='BRh-':    
    kanGrubu_a=np.array([0,0,0,0,0,0,0,1]) 
    #print(bilgiler_bagimli)   

#BeslenmeAnalizi.xlsx verileri ile yapılan işlemler
one=np.append(yas_a,kilo_a)
two=np.append(one,boy_a)
three=np.append(two,cinsiyet_a)
kullanici_bagimli_veri=np.append(three,kanGrubu_a)
kullanici_bagimli_veri_new=kullanici_bagimli_veri.reshape(1,-1)

#BeslenmeAnaliziBolgeler.xlsx verileri ile yapılan işlemler
kucuk_kullanici_bagimli_veri=np.append(kanGrubu_a,sehir_a)
kucuk_kullanici_bagimli_veri=kucuk_kullanici_bagimli_veri.reshape(1,-1)
#sadece bolge iceren one hot encode edilmiş veri son tahmin için
bolge_a=sehir_a.reshape(1,-1)

"""
print("Kullanicidan aa  ", one)
print("Kullanicidan bb  ", two) 
print("Kullanicidan bb  ", three)
print('\n')       
"""
#print('last one new : ',kullanici_bagimli_veri_new)


detaylıveri='veriler/BeslenmeAnalizi.xlsx'
maxveri=pd.read_excel(detaylıveri)
basitveri='veriler/BeslenmeAnaliziBolgeler.xlsx'
minveri=pd.read_excel(basitveri)

#cinsiyet , yaş , kilo , boy , kan grubu , memleket
verigrubu=maxveri.iloc[:,3:9]

#şimdi ilk olarak cinsiyet grubunda label hot encoding yapıcaz yani 0,1 e çeviricez
le = preprocessing.LabelEncoder()
#cinsiyet dönüştürülmüş sutununa cinsiyeti sayısallaırıp atadık
verigrubu['cinsiyet_donusturulmus']= le.fit_transform(verigrubu['Cinsiyet'])
#print(verigrubu['cinsiyet_donusturulmus'])
"""
le = preprocessing.LabelEncoder()
cinsiyet[:,0]=le.fit_transform(verigrubu.iloc[:,0])
encode_cinsiyet=cinsiyet.apply(preprocessing.LabelEncoder().fit_transform)
le = preprocessing.LabelEncoder()

"""

#şimdi one hot encoding işlemine geçiyoruz kan grubunu encode ediyoruz
verigrubu['Kan Grubu'] = pd.Categorical(verigrubu['Kan Grubu'])
kan_grubu = pd.get_dummies(verigrubu['Kan Grubu'], prefix = 'Grup')

#one hot encode u kan grubu ve bölge  için yapıcam
minveri['Kan Grubunuz']=pd.Categorical(minveri['Kan Grubunuz'])
kan_grubu_minveri = pd.get_dummies(minveri['Kan Grubunuz'], prefix = 'Grup')

minveri['Bölge olarak nerelisiniz']=pd.Categorical(minveri['Bölge olarak nerelisiniz'])
bolge_minveri = pd.get_dummies(minveri['Bölge olarak nerelisiniz'], prefix = '')

#min veri deki kan grubu ve bolge verilerini birleştiricez
bagimli_minveri = pd.concat([kan_grubu_minveri, bolge_minveri], axis=1)

#burada veri grubunda sayısal olan degerleri aldık
bagimli_veri_1=verigrubu.iloc[:,1:4]
bagimli_veri_2=verigrubu.iloc[:,6:7]

#şimdi ise concat ile kangrubu sutunları ile veri grubu birleştirilecek
bagimli_veri_3 = pd.concat([bagimli_veri_1, bagimli_veri_2], axis=1)
bagimli_veri_4 = pd.concat([bagimli_veri_3,kan_grubu],axis=1)
bagimli_veri_new=bagimli_veri_4.iloc[:,].values

#şimdi ise bagımsız verimizi ekliyoruz makarna/ pivav
bagimsiz_veri=maxveri.iloc[:,19:20].values.ravel()

# başka bir bagımsız veri olan kepekli ekmek / beyaz ekmek verisini ekliyoruz
bagimsiz_veri_ekmek=maxveri.iloc[:,20:21].values.ravel()
bagimsiz_veri_vazgecilmez=maxveri.iloc[:,21:22].values.ravel()
bagimsiz_veri_atistirmalik=maxveri.iloc[:,22:23].values.ravel()

# min veri grubundaki degerlerden bagımsız veri grubunu alıcaz
min_bagimsizveri_tercih=minveri.iloc[:,4:5].values.ravel()
min_bagimsizveri_tercihedilmeyen=minveri.iloc[:,5:6].values.ravel()
min_bagimsizveri_salata=minveri.iloc[:,6:7].values.ravel()

#Logistic Regregsion Kullanarak yapılan sınıflandırm için yazdıgımız fonkksiyon
#Dogruluk oranı düşüktür
def tahmin(bagimliveri,bagimsizveri ,tahminadi,kullaniciVerileri):
    x_train, x_test, y_train, y_test = train_test_split(bagimliveri, bagimsizveri, test_size=0.33, random_state=0)
    sc = StandardScaler()
    X_train = sc.fit_transform(x_train)
    X_test = sc.transform(x_test)
    logr = LogisticRegression(random_state=0)
    logr.fit(X_train, y_train)
    y_pred = logr.predict(X_test)
    y_pred_kullanici=logr.predict(kullaniciVerileri)
  
    #print("Yeni tahmin edilen ",tahminadi,":",y_pred_kullanici)
    """
    #buradan sonra  tahminin dogruluk sonuçunu elde etme aşamasına geçiyoruz.
    dogrulukOranı = metrics.accuracy_score(y_test, y_pred)
    dogrulukOranı = metrics.accuracy_score(y_test, y_pred)
    print("Dogru Tahmin Oranı :" , dogrulukOranı)
    """

    # Burada string olan tahmin verilerinin dogrugulugu string veri türünde hesaplanamaması
    # için label encode işlemi gerçekleştirdik.

    le.fit(y_test)
    list(le.classes_)
    y_test_new = le.transform(y_test)

    le.fit(y_pred)
    list(le.classes_)
    y_pred_new = le.transform(y_pred)

    return y_pred_kullanici

    # Şimdi ise dogruluk oranı puanı hesaplama işlemlerine geçicez
    #dogrulukOranı = metrics.accuracy_score(y_test_new, y_pred_new)
    #print(tahminadi,"Dogru Tahmin Oranı :", dogrulukOranı)


#KNN algorıtması kullanarak yazacagımız fonksiyon
def tahmin_KNN(bagimliveri,bagimsizveri ,tahminadi ,kullaniciVerileri):
    x_train, x_test, y_train, y_test = train_test_split(bagimliveri, bagimsizveri, test_size=0.33, random_state=0)
    sc = StandardScaler()
    X_train = sc.fit_transform(x_train)
    X_test = sc.transform(x_test)
    knn = KNeighborsClassifier(n_neighbors=5,metric='minkowski')
    knn.fit(X_train,y_train)
    y_pred = knn.predict(X_test)
    y_pred_kullanici=knn.predict(kullaniciVerileri)
  
    #print("Yeni tahmin edilen ",tahminadi,":",y_pred_kullanici)

    le.fit(y_test)
    list(le.classes_)
    y_test_new = le.transform(y_test)

    le.fit(y_pred)
    list(le.classes_)
    y_pred_new = le.transform(y_pred)

    return y_pred_kullanici

    # Şimdi ise dogruluk oranı puanı hesaplama işlemlerine geçicez
    #dogrulukOranı = metrics.accuracy_score(y_test_new, y_pred_new)
    #print(tahminadi, "Dogru Tahmin Oranı :", dogrulukOranı)


#yaş,kilo,boy,kangrubu ama kangrubu one hot encode edilecek
#bilgiler_bagimli=[25,60,168,0,0,1,0,0,0,0,0]

"""
bilgiler_bagimli=np.array([25,60,168,0,0,1,0,0,0,0,0,0])
bilgiler_bagimli=bilgiler_bagimli.reshape(1,-1)
bilgiler_bagimsiz=['25','60','168','0','0','1','0','0','0','0','0','0']
#print("bagimli veri new satırı",bagimli_veri_new.iloc[1:2,:])
"""

#Random Forest Algoritmasını kullanarak yazıgımız fonksiyon
def tahmin_RandomForest(bagimliveri,bagimsizveri ,tahminadi,kullaniciVerileri):
    x_train, x_test, y_train, y_test = train_test_split(bagimliveri, bagimsizveri, test_size=0.33, random_state=0)
    sc = StandardScaler()
    X_train = sc.fit_transform(x_train)
    X_test = sc.transform(x_test)
    rfc = RandomForestClassifier(n_estimators=10, criterion='entropy')
    rfc.fit(X_train, y_train)
    y_pred = rfc.predict(X_test)
    y_pred_kullanici=rfc.predict(kullaniciVerileri)
  
    #print("Yeni tahmin edilen ",tahminadi,":",y_pred_kullanici)

    le.fit(y_test)
    list(le.classes_)
    y_test_new = le.transform(y_test)

    le.fit(y_pred)
    list(le.classes_)
    y_pred_new = le.transform(y_pred)

    return y_pred_kullanici

    # Şimdi ise dogruluk oranı puanı hesaplama işlemlerine geçicez
    #dogrulukOranı = metrics.accuracy_score(y_test_new, y_pred_new)
    #print(tahminadi, "Dogru Tahmin Oranı :", dogrulukOranı)

"""
#Support Vector Machine Algoritması ile Sınıflandırma yapıp tahmin edilecek kod
def tahmin_SVM(bagimliveri,bagimsizveri ,tahminadi):
    x_train, x_test, y_train, y_test = train_test_split(bagimliveri, bagimsizveri, test_size=0.50, random_state=0)
    sc = StandardScaler()
    X_train = sc.fit_transform(x_train)
    X_test = sc.transform(x_test)
    svc = SVC(kernel='rbf')
    svc.fit(X_train, y_train)
    y_pred = svc.predict(X_test)

    le.fit(y_test)
    list(le.classes_)
    y_test_new = le.transform(y_test)

    le.fit(y_pred)
    list(le.classes_)
    y_pred_new = le.transform(y_pred)



    # Şimdi ise dogruluk oranı puanı hesaplama işlemlerine geçicez
    dogrulukOranı = metrics.accuracy_score(y_test_new, y_pred_new)
    print(tahminadi, "Dogru Tahmin Oranı :", dogrulukOranı)

"""
#Naif Bayes Algoritması ile Sınıflandırma yapıp tahmin edilecek kod
def tahmin_NBA(bagimliveri,bagimsizveri ,tahminadi,kullaniciVerileri):
    x_train, x_test, y_train, y_test = train_test_split(bagimliveri, bagimsizveri, test_size=0.50, random_state=0)
    sc = StandardScaler()
    X_train = sc.fit_transform(x_train)
    X_test = sc.transform(x_test)
    gnb = GaussianNB()
    gnb.fit(X_train, y_train)
    y_pred = gnb.predict(X_test)
    #print("kendi tahminleri:",y_pred)
    y_pred_kullanici=gnb.predict(kullaniciVerileri)
    #print("Yeni tahmin edilen ",tahminadi,":",y_pred_kullanici)

    le.fit(y_test)
    list(le.classes_)
    y_test_new = le.transform(y_test)

    le.fit(y_pred)
    list(le.classes_)
    y_pred_new = le.transform(y_pred)

    return y_pred_kullanici

    # Şimdi ise dogruluk oranı puanı hesaplama işlemlerine geçicez
    #dogrulukOranı = metrics.accuracy_score(y_test_new, y_pred_new)
    #print(tahminadi, "Dogru Tahmin Oranı :", dogrulukOranı)

"""
#Decision Tree Algoritması ile Sınıflandırma yapıp tahmin edilecek kod
def tahmin_DTree(bagimliveri,bagimsizveri ,tahminadi,kullaniciVerileri):
    x_train, x_test, y_train, y_test = train_test_split(bagimliveri, bagimsizveri, test_size=0.50, random_state=0)
    sc = StandardScaler()
    X_train = sc.fit_transform(x_train)
    X_test = sc.transform(x_test)
    dtc = DecisionTreeClassifier(criterion='entropy')
    dtc.fit(X_train, y_train)
    y_pred = dtc.predict(X_test)
    y_pred_kullanici=dtc.predict(kullaniciVerileri).reshape(-1, 1)
    print("Yeni tahmin edilen kullanicidan aldigimiz veri ",y_pred_kullanici)

    le.fit(y_test)
    list(le.classes_)
    y_test_new = le.transform(y_test)

    le.fit(y_pred)
    list(le.classes_)
    y_pred_new = le.transform(y_pred)
    
    # Şimdi ise dogruluk oranı puanı hesaplama işlemlerine geçicez
    #dogrulukOranı = metrics.accuracy_score(y_test_new, y_pred_new)
    #print(tahminadi, "Dogru Tahmin Oranı :", dogrulukOranı)

"""
tahmin_makarna_pilav=tahmin_RandomForest(bagimli_veri_new,bagimsiz_veri,'Random Forest Makarna - Pilav',kullanici_bagimli_veri_new)
tahmin_kepekli_beyaz=tahmin_RandomForest(bagimli_veri_new,bagimsiz_veri_ekmek,'Random Forest Beyaz - Kepekli Ekmek' ,kullanici_bagimli_veri_new)
tahmin_vazgec=tahmin_RandomForest(bagimli_veri_new,bagimsiz_veri_vazgecilmez,'Random  Forest Hangisinden Vazgeçemessiniz',kullanici_bagimli_veri_new)
tahmin_yas_kuru_meyve=tahmin_NBA(bagimli_veri_new,bagimsiz_veri_atistirmalik,'Naive Bayes Yaş Meyve -Kuru Meyve',kullanici_bagimli_veri_new)

print('')

#kucuk veri grubunda tahmin yapıcaz
tahmin_kucuk_tercih=tahmin(bagimli_minveri,min_bagimsizveri_tercih,'Logistic Hangisini Tercih Edersiniz',kucuk_kullanici_bagimli_veri)
#tercih_arr=np.array(tercih)
tahmin_kucuk_tercih_edilmeyen=tahmin(bagimli_minveri,min_bagimsizveri_tercihedilmeyen,'Logistic Hangisi Sizi Rahatsız Ediyor',kucuk_kullanici_bagimli_veri)
#print('Bu veri her iki grubunda oldugu veri grubuyla daha iyi tahnin edlebiliyor o sebeple onun algoritmalar ile denemeyecegim ')
tahmin_kucuk_salata=tahmin_KNN(bolge_minveri,min_bagimsizveri_salata,'KNN Hangi salatayı tercih edersiniz',bolge_a)
"""
print("Makarna Pilav : " , tahmin_makarna_pilav[0])
print("Beyaz - Kepekli Ekmek  " , tahmin_kepekli_beyaz[0])
print("Hangisinden vazgeçemessin " , tahmin_vazgec[0])
print("Yas meyve kuru meyve " , tahmin_yas_kuru_meyve[0])
print("Tahmin küçük veri tercih  " , tahmin_kucuk_tercih[0])
print("Tahmin küçük veri istenmeyen " , tahmin_kucuk_tercih_edilmeyen[0])
print("Tahmin küçük veri salata " , tahmin_kucuk_salata[0])
"""
import MySQLdb

def cevirici(kelime):
    önceki_karakterler =   ["ş","ç","ö","ğ","ü","ı", "Ş", "Ç", "Ö", "Ğ","Ü", "İ"]
    sonraki_karakterler =  ["s", "c", "o","g","u", "i", "S","C","O", "G", "U"  "I"]
    for i in range(11):
        kelime=kelime.replace(önceki_karakterler[i],sonraki_karakterler[i])
    return kelime
    



a=UserID
a1=str(a)
#print(a1)
b=str(tahmin_makarna_pilav[0])
c=tahmin_kepekli_beyaz[0]
d=tahmin_vazgec[0]
e=tahmin_yas_kuru_meyve[0]
f=tahmin_kucuk_tercih[0]
g=tahmin_kucuk_tercih_edilmeyen[0]
h=tahmin_kucuk_salata[0]





a1=cevirici(a1)
b=cevirici(b)
c=cevirici(c)
d=cevirici(d)
e=cevirici(e)
f=cevirici(f)
g=cevirici(g)
h=cevirici(h)

#print("1:",a1,"2:",b,"3:",c,"4:",d,"5:",e,"6:",f,"7:",g,"8:",h)


"""
a1 = a1.decode('utf8', 'strict') 
b = b.decode('utf8', 'strict') 
c = c.decode('utf8', 'strict')
d = d.decode('utf8', 'strict')
f = f.decode('utf8', 'strict')
e = e.decode('utf8', 'strict')
g = g.decode('utf8', 'strict')
h = h.decode('utf8', 'strict')
#d=str(d, 'utf-8')
"""


def connection(userid,first,second,third,fourth,fifth,sixth,seventh):
    #print("*************************************************************************************************************************************************************")
    #print("1:",userid," 2:",onea," 3:",twoa," 4:",threea," 5:",foura," 6:",fivea ," 7:" ,sixa," 8:",sevena)
    db=MySQLdb.connect("localhost","root","","dietician")
   
    insertrec=db.cursor()
    sqlquery="insert into analyse(user_id,predict_one,predict_two,predict_three,predict_four,predict_five,predict_six,predict_seven) values ('"+ userid + "','"+ first + "','"+ second +"','"+ third +"','"+ fourth +"','"+ fifth +"', '"+ sixth +"', '"+ seventh +"')"
   
    insertrec.execute(sqlquery)
    db.commit()
    #print('Record Saved Succesflyy ..')
    db.close()

connection(a1,b,c,d,e,f,g,h)




