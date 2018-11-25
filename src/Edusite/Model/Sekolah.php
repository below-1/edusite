<?php

namespace Edusite\Model;

/**
 * @Entity @Table(name="sekolah")
 */
class Sekolah {

    /**
     * @Id @Column(type="integer") @GeneratedValue
     */
    protected $id;

    /**
     * @Column(type="integer", nullable=true)
     */
    protected $kategori;

    /**
     * @Column(type="string", nullable=true)
     */
    protected $nss;

    /**
     * @Column(type="string", nullable=true)
     */
    protected $nama;

    /**
     * @Column(type="string", nullable=true)
     */
    protected $npsn;

    /**
     * @Column(type="integer", nullable=true)
     */
    protected $tahunBerdiri;

    /**
     * @Column(type="integer", nullable=true)
     */
    protected $tahunBeroperasi;

    /**
     * @Column(type="string", nullable=true)
     */
    protected $statusAkreditasi;

    /**
     * @Column(type="string", nullable=true)
     */
    protected $imb;

    /**
     * @Column(type="string", nullable=true)
     */
    protected $latitude;

    /**
     * @Column(type="string", nullable=true)
     */
    protected $longitude;

    /**
     * @Column(type="text", nullable=true)
     */
    protected $visi;

    /**
     * @Column(type="text", nullable=true)
     */
    protected $misi;

    /**
     * @Column(type="string", nullable=true)
     */
    protected $alamat;

    /**
     * @Column(type="string", nullable=true)
     */
    protected $provinsi;

    /**
     * @Column(type="string", nullable=true)
     */
    protected $kabupaten;

    /**
     * @Column(type="string", nullable=true)
     */
    protected $kecamatan;

    /**
     * @Column(type="string", nullable=true)
     */
    protected $kelurahanDesa;

    /**
     * @Column(type="string", nullable=true)
     */
    protected $kodePos;

    /**
     * @Column(type="string", nullable=true)
     */
    protected $telepon;

    /**
     * @Column(type="string", nullable=true)
     */
    protected $email;

    /**
     * @Column(type="string", nullable=true)
     */
    protected $statusTanah;

    /**
     * @Column(type="string", nullable=true)
     */
    protected $luasTanah;

    /**
     * @Column(type="string", nullable=true)
     */
    protected $bangunanAsetPemerintah;

    /**
     * @Column(type="string", nullable=true)
     */
    protected $bangunanHibahPemerintah;

    /**
     * @Column(type="string", nullable=true)
     */
    protected $bangunanAsetYayasan;

    /**
     * @Column(type="string", nullable=true)
     */
    protected $bangunanHibahPihakLain;

    /**
     * @Column(type="integer", nullable=true)
     */
    protected $luasBangunan;


    /**
     * @Column(type="string")
     */
    protected $username;
    /**
     * @Column(type="string")
     */
    protected $password;
    
    /**
     * @Column(type="string", nullable=true)
     */
    protected $imUrl;
    
    /**
     * @Column(type="integer", nullable=true)
     */
    protected $paudLakiLaki;
    /**
     * @Column(type="integer", nullable=true)
     */
    protected $paudPerempuan;
    /**
     * @Column(type="integer", nullable=true)
     */
    protected $paud23;
    /**
     * @Column(type="integer", nullable=true)
     */
    protected $paud34;
    /**
     * @Column(type="string", nullable=true)
     */
    protected $negriSwasta;

    public function getId() { return $this->id; }
    public function getKategori() { return $this->kategori; }
    public function getNss() { return $this->nss; }
    public function getNama() { return $this->nama; }
    public function getNpsn() { return $this->npsn; }
    public function getTahunBerdiri() { return $this->tahunBerdiri; }
    public function getTahunBeroperasi() { return $this->tahunBeroperasi; }
    public function getStatusAkreditasi() { return $this->statusAkreditasi; }
    public function getImb() { return $this->imb; }
    public function getLatitude() { return $this->latitude; }
    public function getLongitude() { return $this->longitude; }
    public function getVisi() { return $this->visi; }
    public function getMisi() { return $this->misi; }
    public function getAlamat() { return $this->alamat; }
    public function getProvinsi() { return $this->provinsi; }
    public function getKabupaten() { return $this->kabupaten; }
    public function getKecamatan() { return $this->kecamatan; }
    public function getKelurahanDesa() { return $this->kelurahanDesa; }
    public function getKodePos() { return $this->kodePos; }
    public function getTelepon() { return $this->telepon; }
    public function getEmail() { return $this->email; }
    public function getStatusTanah() { return $this->statusTanah; }
    public function getLuasTanah() { return $this->luasTanah; }
    public function getBangunanAsetPemerintah() { return $this->bangunanAsetPemerintah; }
    public function getBangunanHibahPemerintah() { return $this->bangunanHibahPemerintah; }
    public function getBangunanAsetYayasan() { return $this->bangunanAsetYayasan; }
    public function getBangunanHibahPihakLain() { return $this->bangunanHibahPihakLain; }
    public function getLuasBangunan() { return $this->luasBangunan; }
    public function getUsername() { return $this->username; }
    public function getPassword() { return $this->password; }
    public function getImUrl() { return $this->imUrl; }
    public function getNegriSwasta() { return $this->negriSwasta; }

    public function getPaudLakiLaki() { return $this->paudLakiLaki; }
    public function getPaudPerempuan() { return $this->paudPerempuan; }
    public function getPaud23() { return $this->paud23; }
    public function getPaud34() { return $this->paud34; }

    public function setKategori($val) { $this->kategori = $val; }
    public function setNss($val) { $this->nss = $val; }
    public function setNama($val) { $this->nama = $val; }
    public function setNpsn($val) { $this->npsn = $val; }
    public function setTahunBerdiri($val) { $this->tahunBerdiri = $val; }
    public function setTahunBeroperasi($val) { $this->tahunBeroperasi = $val; }
    public function setStatusAkreditasi($val) { $this->statusAkreditasi = $val; }
    public function setImb($val) { $this->imb = $val; }
    public function setLatitude($val) { $this->latitude = $val; }
    public function setLongitude($val) { $this->longitude = $val; }
    public function setVisi($val) { $this->visi = $val; }
    public function setMisi($val) { $this->misi = $val; }
    public function setAlamat($val) { $this->alamat = $val; }
    public function setProvinsi($val) { $this->provinsi = $val; }
    public function setKabupaten($val) { $this->kabupaten = $val; }
    public function setKecamatan($val) { $this->kecamatan = $val; }
    public function setKelurahanDesa($val) { $this->kelurahanDesa = $val; }
    public function setKodePos($val) { $this->kodePos = $val; }
    public function setTelepon($val) { $this->telepon = $val; }
    public function setEmail($val) { $this->email = $val; }
    public function setStatusTanah($val) { $this->StatusTanah = $val; }
    public function setLuasTanah($val) { $this->LuasTanah = $val; }
    public function setBangunanAsetPemerintah($val) { $this->bangunanAsetPemerintah = $val; }
    public function setBangunanHibahPemerintah($val) { $this->bangunanHibahPemerintah = $val; }
    public function setBangunanAsetYayasan($val) { $this->bangunanAsetYayasan = $val; }
    public function setBangunanHibahPihakLain($val) { $this->bangunanHibahPihakLain = $val; }
    public function setLuasBangunan($val) { $this->LuasBangunan = $val; }

    public function setUsername($val) { $this->username = $val; }
    public function setPassword($val) { $this->password = $val; }
    public function setImUrl($val) { $this->imUrl = $val; }

    public function setPaudLakiLaki($val) { $this->paudLakiLaki = $val; }
    public function setPaudPerempuan($val) { $this->paudPerempuan = $val; }
    public function setPaud23($val) { $this->paud23 = $val; }
    public function setPaud34($val) { $this->paud34 = $val; }

    public function setNegriSwasta($val) { return $this->negriSwasta = $val; }
}