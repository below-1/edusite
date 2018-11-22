<?php

namespace Edusite\Model;

/**
 * @Entity @Table(name="kecamatan")
 */
class Kecamatan {
    /**
     * @Id @Column(type="integer") @GeneratedValue
     */
    protected $id;

    /**
     * @Column(type="string", nullable=true)
     */
    protected $nama;

    public function getId () { return $this->id; }
    public function getNama () { return $this->nama; }
    public function setNama ($val) { $this->nama = $val; }
}