<?php

namespace Edusite\Model;

/**
 * @Entity @Table(name="pegawai")
 */
class Pegawai {

    /**
     * @Id @Column(type="integer") @GeneratedValue
     */
    protected $id;
    /**
     * @ManyToOne(targetEntity="Sekolah")
     * @JoinColumn(name="sekolah_id", referencedColumnName="id")
     */
    protected $sekolah;
    /**
     * @Column(type="smallint", nullable=true)
     */
    protected $kategori;
    /**
     * @Column(type="string", nullable=true)
     */
    protected $nama;
    /**
     * @Column(type="string", nullable=true)
     */
    protected $nip;
    /**
     * @Column(type="string", nullable=true)
     */
    protected $nuptk;
    /**
     * @Column(type="string", nullable=true)
     */
    protected $golongan;
    /**
     * @Column(type="string", nullable=true)
     */
    protected $ruang;
    /**
     * @Column(type="string", nullable=true)
     */
    protected $jk;
    /**
     * @Column(type="string", nullable=true)
     */
    protected $tempatLahir;
    /**
     * @Column(type="date", nullable=true)
     */
    protected $tanggalLahir;
    /**
     * @Column(type="string", nullable=true)
     */
    protected $jabatan;
    /**
     * @Column(type="string", nullable=true)
     */
    protected $status;

    /**
     * @Column(type="smallint", nullable=true)
     */
    protected $pendTerakhir;

    public function getId() { return $this->id; }
    public function getSekolah() { return $this->sekolah; }
    public function getKategori() { return $this->kategori; }
    public function getNama() { return $this->nama; }
    public function getNip() { return $this->nip; }
    public function getNuptk() { return $this->nuptk; }
    public function getGolongan() { return $this->golongan; }
    public function getRuang() { return $this->ruang; }
    public function getTempatLahir() { return $this->jk; }
    public function getTanggalLahir() { return $this->tanggalLahir; }
    public function getStatus() { return $this->jabatan; }
    public function getPendTerakhir() { return $this->pendTerakhir; }

    public function setSekolah ($val) { $this->sekolah = $val; }
    public function setKategori ($val) { $this->kategori = $val; }
    public function setNama ($val) { $this->nama = $val; }
    public function setNip ($val) { $this->nip = $val; }
    public function setNuptk ($val) { $this->nuptk = $val; }
    public function setGolongan ($val) { $this->golongan = $val; }
    public function setJabatan ($val) { $this->jabatan = $val; }
    public function setRuang ($val) { $this->ruang = $val; }
    public function setTempatLahir ($val) { $this->tempatLahir = $val; }
    public function setTanggalLahir ($val) { $this->tanggalLahir = $val; }
    public function setStatus ($val) { $this->status = $val; }
    public function setPendTerakhir ($val) { $this->pendTerakhir = $val; }
}