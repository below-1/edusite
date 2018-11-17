<?php

namespace Edusite\Model;

/**
 * @Entity @Table(name="bantuan")
 */
class Bantuan {
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
     * @Column(type="integer", nullable=true)
     */
    protected $tahun;

    /**
     * @Column(type="string", nullable=true)
     */
    protected $nama;

    /**
     * @Column(type="integer")
     */
    protected $tipeBantuan;

    /**
     * @Column(type="integer",  nullable=true)
     */
    protected $tipeAlat;

    /**
     * @Column(type="string", nullable=true)
     */
    protected $kondisi;

    public function getId() { return $this->id; }
    public function getSekolah() { return $this->sekolah; }
    public function getTahun() { return $this->tahun; }
    public function getNama() { return $this->nama; }
    public function getTipeBantuan() { return $this->tipeBantuan; }
    public function getTipeAlat() { return $this->tipeAlat; }
    public function getKondisi() { return $this->kondisi; }

    public function setSekolah($val) { $this->sekolah = $val; }
    public function setTahun($val) { $this->tahun = $val; }
    public function setNama($val) { $this->nama = $val; }
    public function setTipeBantuan($val) { $this->tipeBantuan = $val; }
    public function setTipeAlat($val) { $this->tipeAlat = $val; }
    public function setKondisi($val) { $this->kondisi = $val; }
}