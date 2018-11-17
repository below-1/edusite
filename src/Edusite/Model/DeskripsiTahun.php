<?php

namespace Edusite\Model;

/**
 * @Entity @Table(name="deskripsi_tahun")
 */
class DeskripsiTahun {
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
     * @Column(type="integer", nullable=true)
     */
    protected $js1;
    /**
     * @Column(type="integer", nullable=true)
     */
    protected $js2;
    /**
     * @Column(type="integer", nullable=true)
     */
    protected $js3;
    /**
     * @Column(type="integer", nullable=true)
     */
    protected $js4;
    /**
     * @Column(type="integer", nullable=true)
     */
    protected $js5;
    /**
     * @Column(type="integer", nullable=true)
     */
    protected $js6;
    /**
     * @Column(type="integer", nullable=true)
     */
    protected $rb1;
    /**
     * @Column(type="integer", nullable=true)
     */
    protected $rb2;
    /**
     * @Column(type="integer", nullable=true)
     */
    protected $rb3;
    /**
     * @Column(type="integer", nullable=true)
     */
    protected $rb4;
    /**
     * @Column(type="integer", nullable=true)
     */
    protected $rb5;
    /**
     * @Column(type="integer", nullable=true)
     */
    protected $rb6;

    /**
     * @Column(type="integer", nullable=true)
     */
    protected $lanjutSMPN;
    /**
     * @Column(type="integer", nullable=true)
     */
    protected $lanjutSMPS;
    /**
     * @Column(type="integer", nullable=true)
     */
    protected $lanjutMTS;
    /**
     * @Column(type="integer", nullable=true)
     */
    protected $lanjutPontren;

    /**
     * @Column(type="integer", nullable=true)
     */
    protected $jumlahSiswa;

    /**
     * @Column(type="integer", nullable=true)
     */
    protected $jumlahLulus;

    public function getSekolah () { return $this->sekolah; }
    public function getTahun () { return $this->tahun; }

    public function getJs1() { return $this->js1; }
    public function getJs2() { return $this->js2; }
    public function getJs3() { return $this->js3; }
    public function getJs4() { return $this->js4; }
    public function getJs5() { return $this->js5; }
    public function getJs6() { return $this->js6; }

    public function getRb1() { return $this->rb1; }
    public function getRb2() { return $this->rb2; }
    public function getRb3() { return $this->rb3; }
    public function getRb4() { return $this->rb4; }
    public function getRb5() { return $this->rb5; }
    public function getRb6() { return $this->rb6; }
    
    public function getLanjutSMPN() { return $this->lanjutSMPN; }
    public function getLanjutSMPS() { return $this->lanjutSMPS; }
    public function getLanjutMTS() { return $this->lanjutMTS; }
    public function getLanjutPontren() { return $this->lanjutPontren; }

    public function getJumlahSiswa() { return $this->jumlahSiswa; }
    public function getJumlahLulus() { return $this->jumlahLulus; }

    public function setJs1($val) { $this->js1 = $val; }
    public function setJs2($val) { $this->js2 = $val; }
    public function setJs3($val) { $this->js3 = $val; }
    public function setJs4($val) { $this->js4 = $val; }
    public function setJs5($val) { $this->js5 = $val; }
    public function setJs6($val) { $this->js6 = $val; }

    public function setRb1($val) { $this->rb1 = $val; }
    public function setRb2($val) { $this->rb2 = $val; }
    public function setRb3($val) { $this->rb3 = $val; }
    public function setRb4($val) { $this->rb4 = $val; }
    public function setRb5($val) { $this->rb5 = $val; }
    public function setRb6($val) { $this->rb6 = $val; }

    public function setLanjutSMPN($val) { $this->lanjutSMPN = $val; }
    public function setLanjutSMPS($val) { $this->lanjutSMPS = $val; }
    public function setLanjutMTS($val) { $this->lanjutMTS = $val; }
    public function setLanjutPontren($val) { $this->lanjutPontren = $val; }

    public function setJumlahSiswa($val) { $this->jumlahSiswa = $val; }
    public function setJumlahLulus($val) { $this->jumlahLulus = $val; }

    public function setSekolah ($val) { $this->sekolah = $val; }
    public function setTahun ($val) { $this->tahun = $val; }
}