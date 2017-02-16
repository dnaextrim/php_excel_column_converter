<?php
/*
 * Created by Dony Wahyu Isp
 */
class ExcelColumnConvert {
    const COLSDEFINE = 'A,B,C,D,E,F,G,H,I,J,K,L,M,N,O,P,Q,R,S,T,U,V,W,X,Y,Z';
    private $colCombinationCount = 0;
    private $cols = [];

    public function __construct()
    {
        $this->cols = explode(',', self::COLSDEFINE);
        
        $p = 0;
        $n = count($this->cols);
        
        for ($i=1; $i<=$n; $i++) {
            $p += pow($n, $i);
        }

        $this->colCombinationCount = $p;
    }

    public function getCharCount() {
        return count($this->cols);
    }

    public function getColsCount() {
        return $this->colCombinationCount;
    }

    public function toAuto($col)
    {
        if (is_numeric($col)) {
            return $this->getLabel($col);
        } else {
            return $this->getIndex($col);
        }
    }

    public function toIndex($col)
    {
        return $this->getIndex($col);
    }

    public function toLabel($col)
    {
        return $this->getLabel($col);
    }

    private function getIndex($col) 
    {
        $colChar = str_split(strtoupper($col));
        $n = count($this->cols);

        if (count($colChar)==2) {
            return ($n*(array_search($colChar[0], $this->cols) + 1)) + (array_search($colChar[count($colChar) - 1], $this->cols) + 1);
        } elseif (count($colChar)>2) {
            $col = substr($col, 0, strlen($col)-1);
            return ($n * $this->getIndex($col))+(array_search($colChar[count($colChar) - 1], $this->cols) + 1);
        } else {
            return array_search($colChar[count($colChar) - 1], $this->cols) + 1;
        }
    }

    private function getLabel($col)
    {
        $n = count($this->cols);   
        $name = '';

        while ($col > 0) {
            $m = ($col-1) % $n;
            $name = $this->cols[$m].$name;
            $col = floor(($col - $m) / $n);
        }

        return $name;
    }
}

/*
 * Example of use
 */
$col = strtoupper((isset($_GET['col']))? $_GET['col'] : null);

$c = new ExcelColumnConvert();

$n = $c->getCharCount();
for($i=1; $i<=100; $i++) {
    if (($i>1) && ($i % $n == 1)) echo '<br />';
    echo "$i:".$c->toAuto($i) . ' | ';
}

echo '<hr />';
if (!empty($col)) {
    echo ("<strong>Result: $col:".$c->toAuto($col).'</strong>');
}
