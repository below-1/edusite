<?php

namespace Edusite\Model;

/**
 * @Entity @Table(name="fasilitas")
 */
class Fasilitas {

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
     * @Column(type="string", nullable=true)
     */
    protected $nama;
    /**
     * @Column(type="integer", nullable=true)
     */
    protected $jumlah;
    /**
     * @Column(type="string", nullable=true)
     */
    protected $kondisi;

    public function getId() { return $this->id; }
    public function getSekolah() { return $this->sekolah; }
    public function getNama() { return $this->nama; }
    public function getJumlah() { return $this->jumlah; }
    public function getKondisi() { return $this->kondisi; }

    public function setSekolah ($val) { $this->sekolah = $val; }
    public function setNama ($val) { $this->nama = $val; }
    public function setJumlah ($val) { $this->jumlah = $val; }
    public function setKondisi ($val) { $this->kondisi = $val; }
}

?>