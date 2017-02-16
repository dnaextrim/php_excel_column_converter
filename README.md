#PHP EXCEL COLUMN CONVERTER


This is library for convert excel column label to number (column index) or from number index to label. This is a simple converter library, this library can use too for bruteforce.

***example of use***
```php
// file name: convert.php
include "ExcelColumnConvert.php";

$col = strtoupper((isset($_GET['col']))? $_GET['col'] : null);

$c = new ExcelColumnConvert();

/*
 * make bruteforce karakter
 */
$n = $c->getCharCount();
for($i=1; $i<=100; $i++) {
    if (($i>1) && ($i % $n == 1)) echo '<br />';
    echo "$i:".$c->toAuto($i) . ' | ';
}
/*
 * End
 */
 
echo '<hr />';
/*
 *
 */
if (!empty($col)) {
    echo ("<strong>Result: $col:".$c->toAuto($col).'</strong>');
}
/*
 * End
 */
```

```
http://localhost/convert.php?col=AB
```
**Result:**

> 1:A | 2:B | 3:C | 4:D | 5:E | 6:F | 7:G | 8:H | 9:I | 10:J | 11:K |
> 12:L | 13:M | 14:N | 15:O | 16:P | 17:Q | 18:R | 19:S | 20:T | 21:U |
> 22:V | 23:W | 24:X | 25:Y | 26:Z |  27:AA | 28:AB | 29:AC | 30:AD |
> 31:AE | 32:AF | 33:AG | 34:AH | 35:AI | 36:AJ | 37:AK | 38:AL | 39:AM
> | 40:AN | 41:AO | 42:AP | 43:AQ | 44:AR | 45:AS | 46:AT | 47:AU |
> 48:AV | 49:AW | 50:AX | 51:AY | 52:AZ |  53:BA | 54:BB | 55:BC | 56:BD
> | 57:BE | 58:BF | 59:BG | 60:BH | 61:BI | 62:BJ | 63:BK | 64:BL |
> 65:BM | 66:BN | 67:BO | 68:BP | 69:BQ | 70:BR | 71:BS | 72:BT | 73:BU
> | 74:BV | 75:BW | 76:BX | 77:BY | 78:BZ |  79:CA | 80:CB | 81:CC |
> 82:CD | 83:CE | 84:CF | 85:CG | 86:CH | 87:CI | 88:CJ | 89:CK | 90:CL
> | 91:CM | 92:CN | 93:CO | 94:CP | 95:CQ | 96:CR | 97:CS | 98:CT |
> 99:CU | 100:CV | 
>
> **Result: AB:28**

```
http://localhost/convert.php?col=23
```

**Result:**
> 1:A | 2:B | 3:C | 4:D | 5:E | 6:F | 7:G | 8:H | 9:I | 10:J | 11:K |
> 12:L | 13:M | 14:N | 15:O | 16:P | 17:Q | 18:R | 19:S | 20:T | 21:U |
> 22:V | 23:W | 24:X | 25:Y | 26:Z |  27:AA | 28:AB | 29:AC | 30:AD |
> 31:AE | 32:AF | 33:AG | 34:AH | 35:AI | 36:AJ | 37:AK | 38:AL | 39:AM
> | 40:AN | 41:AO | 42:AP | 43:AQ | 44:AR | 45:AS | 46:AT | 47:AU |
> 48:AV | 49:AW | 50:AX | 51:AY | 52:AZ |  53:BA | 54:BB | 55:BC | 56:BD
> | 57:BE | 58:BF | 59:BG | 60:BH | 61:BI | 62:BJ | 63:BK | 64:BL |
> 65:BM | 66:BN | 67:BO | 68:BP | 69:BQ | 70:BR | 71:BS | 72:BT | 73:BU
> | 74:BV | 75:BW | 76:BX | 77:BY | 78:BZ |  79:CA | 80:CB | 81:CC |
> 82:CD | 83:CE | 84:CF | 85:CG | 86:CH | 87:CI | 88:CJ | 89:CK | 90:CL
> | 91:CM | 92:CN | 93:CO | 94:CP | 95:CQ | 96:CR | 97:CS | 98:CT |
> 99:CU | 100:CV |
> 
> **Result: 23:W**
