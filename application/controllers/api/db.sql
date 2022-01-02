create table logistik(
logistik_id varchar(20) primary key,
nama_barang varchar(200),
satuan_barang varchar(20),
stok_barang int(11),
keterangan varchar(500),
produk_status varchar(2),
stok_produk_temp1 int(11),
stok_produk_temp2 int(11),
stok_produk_temp3 int(11)
)


create table logistik_trans(
trans_id int(11) primary key,
logistik_id varchar(20),
common_id varchar(20),
kode_trans varchar(5),
tgl_trans date,
kuitansi varchar(20),
pokok double(18,2),
penanggung_jawab varchar(20),
golongan_penerima_logistik varchar(5),
id_penerima_logistik varchar(20),
keterangan varchar(250),
userid varchar(50),
waktu datetime
)

create table pendukung(
pendukung_id varchar(20) primary key,
nama_pendukung varchar(100) not null,
alamat_pendukung varchar(250) not null,
nik varchar(20) not null,
kode_kabupaten varchar(20),
kode_kecamatan varchar(20),
kode_kelurahan varchar(20),
kode_tps varchar(20),
pendukung varchar(2),
relawan varchar(2),
image_pendukung varchar(255),
image_ktp varchar(255),
create_date date,
create_time time);