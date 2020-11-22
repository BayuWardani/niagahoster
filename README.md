# niagahoster

Demo FE : http://frontend.niagahoster.bayuwardani.id/
Demo Boxbilling : http://boxbilling.niagahoster.bayuwardani.id/

# INSTALASI BOXBILLING

1. Install Docker
  Windows : 
    - Download Docker Dekstop https://docs.docker.com/docker-for-windows/install/
    - dan lakukan install seperti biasa
  Mac : 
    - Download Docker Dekstop https://docs.docker.com/docker-for-mac/install/
    - dan lakukan install seperti biasa
  Linux :
    - untuk instalasi di linux bisa mengikut arahan yang ada di sini https://docs.docker.com/engine/install/
2. Download Berkas / clone https://github.com/BayuWardani/niagahoster.git
  - extra folder
  - cd niagahoster/boxbilling
3. Ubah URL di -> boxbilling/install/index.php
  - line 23
  - ubah `http://127.0.0.1:8004` menjadi domain yang kalian gunakan
4. Build App
  Linux & Mac:
    - jalankan ./build.sh
  Windows:
    - docker-compose build --no-cache
    - docker-compose up -d
    - docker ps
5. Install BoxBilling
    - masuk ke url yang digunakan untuk mengakses docker contoh : http://127.0.0.1:8004/boxbilling/install/index.php
    - untuk Halaman Pertama Klik Next
    - Untuk Halaman Kedua koneksi databases

        Host : db
        Databases Name : boxbilling
        Databases user : root
        Databases password : password

      jika ingin mengubah nama db dan password bisa buka `docker-compose.yml` dan ubah pada vairable MYSQL_DATABASE,MYSQL_ROOT_PASSWORD
    - untuk halaman ke 3 isi informasi user admin
        - nama : admin
        - email : admin@email.com
        - password : password
    - setelah selesai langkah selanjutya adalah delete folder install di boxbilling
    - ketik docker ps , dan ambil nilai dari CONTAINER_ID dari yang IMAGES boxbillingdocker_web
    - lalu jalankan docker exec -it CONTAINER_ID rm -rf /var/www/html/boxbilling/install

Setelah semua dijalankan anda sudah dapat menggunakan boxbilling dengan cara mengakses /boxbilling dari base url yang anda gunakan contoh : http://127.0.0.1:8004


# INSTALASI FRONT END
1. Install Docker
  Windows : 
    - Download Docker Dekstop https://docs.docker.com/docker-for-windows/install/
    - dan lakukan install seperti biasa
  Mac : 
    - Download Docker Dekstop https://docs.docker.com/docker-for-mac/install/
    - dan lakukan install seperti biasa
  Linux :
    - untuk instalasi di linux bisa mengikut arahan yang ada di sini https://docs.docker.com/engine/install/
2. Download Berkas / clone https://github.com/BayuWardani/niagahoster.git
  - extra folder
  - cd niagahoster/fe
3. Ubah URL di -> boxbilling/install/index.php
  - line 23
  - ubah `http://127.0.0.1:8004` menjadi domain yang kalian gunakan
4. Build App
  Linux & Mac:
    - jalankan ./build.sh
  Windows:
    - docker build --tag frontend:1.0 --no-cache .
    - docker stop fe
    - docker rm fe
    - docker run --publish 8005:8005 --detach --name fe frontend:1.0
    - docker ps
Setelah semua dijalankan anda sudah dapat menggunakan frontend dengan cara mengakses  dari base url yang anda gunakan contoh : http://127.0.0.1:8005

