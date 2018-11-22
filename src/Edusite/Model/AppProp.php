<?php

namespace Edusite\Model;

/**
 * @Entity @Table(name="app_prop")
 */
class AppProp {

    /**
     * @Id @Column(type="integer") @GeneratedValue
     */
    protected $id;

    /**
     * @Column(type="string", nullable=true)
     */
    protected $nama;

    /**
     * @Column(type="text", nullable=true)
     */
    protected $nilai;

    public function getId() { return $this->id; }
    public function getNama() { return $this->nama; }

    public function setNama($val) { $this->nama = $val; }
    public function setNilai($val) { $this->nilai = $val; }
}

?>