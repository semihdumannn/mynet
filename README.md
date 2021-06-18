<!-- ABOUT THE PROJECT -->
## Mynet Challange Project
Proje Laravel8 ve sail ile yapılmıştır. Bunun için projeyi çalıştırabilmek için docker ın çalışıyor olması gerekmektedir.


<!-- GETTING STARTED -->
## Kurumlum

### Adımlar
Öncelikle projemizin bilgisayardaki konumuna gelip .env.example dosyasını kopyalayıp env ayarlamalarımızı yapıyoruz. 
  ```sh
  cp .env.example .env
 composer install
 php artisan key:generate
CACHE_DRIVER=redis
   ```

Sail komutuyla docker containerlerımızı çalıştırıyoruz.
  ```sh
 ./vendor/bin/sail up 
 ./vendor/bin/sail up -d
   ```
Docker containerler çalıştıktan sonra aşağıdaki komut ile projemizde kullanılan tabloları database ve sisteme giriş için bir kullanıcı oluşturuyoruz.
   ```sh
  ./vendor/bin/sail project:install
   ```
Eğer manuel bir kullanıcı oluşturulmak istenirse komutu kullanılabilir.
   ```sh
  ./vendor/bin/sail project:createProject
   ```
<!-- CONTACT -->
## İletişim
Semih Duman - [@semihduman.com.tr](http://semihduman.com.tr) - semihdumannn@gmail.com





