<?php
namespace metastore;

/**
 * Autogenerated by Thrift Compiler (0.13.0)
 *
 * DO NOT EDIT UNLESS YOU ARE SURE THAT YOU KNOW WHAT YOU ARE DOING
 *  @generated
 */
use Thrift\Base\TBase;
use Thrift\Type\TType;
use Thrift\Type\TMessageType;
use Thrift\Exception\TException;
use Thrift\Exception\TProtocolException;
use Thrift\Protocol\TProtocol;
use Thrift\Protocol\TBinaryProtocolAccelerated;
use Thrift\Exception\TApplicationException;

class RequestPartsSpec
{
    static public $isValidate = false;

    static public $_TSPEC = array(
        1 => array(
            'var' => 'names',
            'isRequired' => false,
            'type' => TType::LST,
            'etype' => TType::STRING,
            'elem' => array(
                'type' => TType::STRING,
                ),
        ),
        2 => array(
            'var' => 'exprs',
            'isRequired' => false,
            'type' => TType::LST,
            'etype' => TType::STRUCT,
            'elem' => array(
                'type' => TType::STRUCT,
                'class' => '\metastore\DropPartitionsExpr',
                ),
        ),
    );

    /**
     * @var string[]
     */
    public $names = null;
    /**
     * @var \metastore\DropPartitionsExpr[]
     */
    public $exprs = null;

    public function __construct($vals = null)
    {
        if (is_array($vals)) {
            if (isset($vals['names'])) {
                $this->names = $vals['names'];
            }
            if (isset($vals['exprs'])) {
                $this->exprs = $vals['exprs'];
            }
        }
    }

    public function getName()
    {
        return 'RequestPartsSpec';
    }


    public function read($input)
    {
        $xfer = 0;
        $fname = null;
        $ftype = 0;
        $fid = 0;
        $xfer += $input->readStructBegin($fname);
        while (true) {
            $xfer += $input->readFieldBegin($fname, $ftype, $fid);
            if ($ftype == TType::STOP) {
                break;
            }
            switch ($fid) {
                case 1:
                    if ($ftype == TType::LST) {
                        $this->names = array();
                        $_size517 = 0;
                        $_etype520 = 0;
                        $xfer += $input->readListBegin($_etype520, $_size517);
                        for ($_i521 = 0; $_i521 < $_size517; ++$_i521) {
                            $elem522 = null;
                            $xfer += $input->readString($elem522);
                            $this->names []= $elem522;
                        }
                        $xfer += $input->readListEnd();
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 2:
                    if ($ftype == TType::LST) {
                        $this->exprs = array();
                        $_size523 = 0;
                        $_etype526 = 0;
                        $xfer += $input->readListBegin($_etype526, $_size523);
                        for ($_i527 = 0; $_i527 < $_size523; ++$_i527) {
                            $elem528 = null;
                            $elem528 = new \metastore\DropPartitionsExpr();
                            $xfer += $elem528->read($input);
                            $this->exprs []= $elem528;
                        }
                        $xfer += $input->readListEnd();
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                default:
                    $xfer += $input->skip($ftype);
                    break;
            }
            $xfer += $input->readFieldEnd();
        }
        $xfer += $input->readStructEnd();
        return $xfer;
    }

    public function write($output)
    {
        $xfer = 0;
        $xfer += $output->writeStructBegin('RequestPartsSpec');
        if ($this->names !== null) {
            if (!is_array($this->names)) {
                throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
            }
            $xfer += $output->writeFieldBegin('names', TType::LST, 1);
            $output->writeListBegin(TType::STRING, count($this->names));
            foreach ($this->names as $iter529) {
                $xfer += $output->writeString($iter529);
            }
            $output->writeListEnd();
            $xfer += $output->writeFieldEnd();
        }
        if ($this->exprs !== null) {
            if (!is_array($this->exprs)) {
                throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
            }
            $xfer += $output->writeFieldBegin('exprs', TType::LST, 2);
            $output->writeListBegin(TType::STRUCT, count($this->exprs));
            foreach ($this->exprs as $iter530) {
                $xfer += $iter530->write($output);
            }
            $output->writeListEnd();
            $xfer += $output->writeFieldEnd();
        }
        $xfer += $output->writeFieldStop();
        $xfer += $output->writeStructEnd();
        return $xfer;
    }
}
