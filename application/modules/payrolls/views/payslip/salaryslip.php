<script>
  function printDiv() {

        var divToPrint = document.getElementById('divToPrint');

        var WindowObject = window.open('', 'Print-Window');
        WindowObject.document.open();
        WindowObject.document.writeln('<!DOCTYPE html>');
        WindowObject.document.writeln('<html><head><title></title><style type="text/css">');


        WindowObject.document.writeln('@media print { .row {display: flex; flex-wrap: wrap; margin-right: -15px; margin-left: -15px; } .col-md-6 { flex: 0 0 50%; max-width: 50%; } .table-responsive { display: block; width: 100%; overflow-x: auto; -webkit-overflow-scrolling: touch; -ms-overflow-style: -ms-autohiding-scrollbar; } .col-md-12 { flex: 0 0 100%; max-width: 100%; } .center { text-align: center;} .underline { text-decoration: underline; } p { display:inline; } .left { margin-left: 315px; text-align="left" display: inline; } .right { margin-right: 375px; display: inline; } td.left_algn { text-align: left; } td.right_algn { text-align: right; } .t2 th { border: 1px solid black; background-color: #c0c0c0; } td.hight { hight: 15px; } table.width { width: 100%; } table.noborder { border: 0px solid black; } th.noborder { border: 0px solid black; } .border { border: 1px solid black; } .bottom { position: absolute;; bottom: 5px; width: 100%; } } </style>');
        WindowObject.document.writeln('</head><body onload="window.print()">');
        WindowObject.document.writeln(divToPrint.innerHTML);
        WindowObject.document.writeln('</body></html>');
        WindowObject.document.close();
        setTimeout(function () {
            WindowObject.close();
        }, 10);

  }
</script>

<?php

    function getIndianCurrency($number) {
        
        $decimal = round($number - ($no = floor($number)), 2) * 100;
        $hundred = null;
        $digits_length = strlen($no);
        $i = 0;
        $str = array();
        $words = array(0 => '', 1 => 'One', 2 => 'Two',
            3 => 'Three', 4 => 'Four', 5 => 'Five', 6 => 'Six',
            7 => 'Seven', 8 => 'Eight', 9 => 'Nine',
            10 => 'Ten', 11 => 'Eleven', 12 => 'Twelve',
            13 => 'Thirteen', 14 => 'Fourteen', 15 => 'Fifteen',
            16 => 'Sixteen', 17 => 'Seventeen', 18 => 'Eighteen',
            19 => 'Nineteen', 20 => 'Twenty', 30 => 'Thirty',
            40 => 'Forty', 50 => 'Fifty', 60 => 'Sixty',
            70 => 'Seventy', 80 => 'Eighty', 90 => 'Ninety');
        $digits = array('', 'Hundred','Thousand','Lakh', 'Crore');
        while( $i < $digits_length ) {
            $divider = ($i == 2) ? 10 : 100;
            $number = floor($no % $divider);
            $no = floor($no / $divider);
            $i += $divider == 10 ? 1 : 2;
            if ($number) {
                $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
                $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
                $str [] = ($number < 21) ? $words[$number].' '. $digits[$counter]. $plural.' '.$hundred:$words[floor($number / 10) * 10].' '.$words[$number % 10]. ' '.$digits[$counter].$plural.' '.$hundred;
            } else $str[] = null;
        }
        $Rupees = implode('', array_reverse($str));
        $paise = ($decimal) ? "and " . ($words[$decimal / 10] . " " . $words[$decimal % 10]) . ' Paise' : '';
        return ($Rupees ? $Rupees . 'Rupees ' : '') . $paise .' Only';
    }

?>

<style>
.t2 th { border: 1px solid black; background-color: #c0c0c0; }
.right_algn { text-align: right; }
</style>

<div class="row">

    <div class="col-12">

        <div class="card">

        <div id="divToPrint">

            <div class="card-body"> 
            
                <!-- <h2 class="card-title" style="margin-left: 42%; display: inline;"><u>Salary Slip</u> 
                <span style="margin-left: 16%; display: inline;">
                    <img src="<?php echo base_url('/assets/images/logo1.png'); ?>" alt="homepage" class="dark-logo" height="30px" />    
                    <img src="<?php echo base_url('/assets/images/logo2.png'); ?>" class="light-logo" alt="homepage" height="30px" />
                </span>
                </h2>
                <h4 class="card-title" style="text-align: center;">INDUS VALLEY AYURVEDIC CENTRE PVT LTD</h4>
                <h4 class="card-title" style="text-align: center;">Tel: +91-821-2473437/263/266, Fax: +91-821-2473590</h4>
                <h4 class="card-title" style="text-align: center;">LALITHADRIPURA, MYSORE 570 028</h4>
 -->
                <h6 class="card-subtitle"></h6>

                <table class="width noborder" cellpadding="3.5">

                    <tr>
                        <th class="noborder" width="25%"></th>
                        <th class="noborder" width="1%"></th>
                        <th class="noborder" width="25%"></th>
                        <th class="noborder" width="1%"></th>
                        <th class="noborder" width="30%"></th>
                        <th class="noborder" width="1%"></th>
                        <th class="noborder" width="25%"></th>
                    </tr>
                    <tr class="t2">
                        <th colspan="7" style="text-align: center;">Pay Slip for the month of <?php echo $this->input->get('month');?> - <?php echo $this->input->get('year');?></th>
                    </tr>
                    <tr>

                        <td>Employee ID</td>
                        <td class="left_algn">:</td>
                        <td class="left_algn"><?php echo $pay_list->emp_code; ?></td>
                        <td></td>
                        <td>Bank Name</td>
                        <td class="left_algn">:</td>
                        <td><?php echo $pay_list->bank_name; ?></td>

                    </tr>

                    <tr>

                        <td>Name</td>
                        <td class="left_algn">:</td>
                        <td class="left_algn"><?php echo $pay_list->emp_name; ?></td>
                        <td></td>
                        <td>Bank A/C No.</td>
                        <td class="left_algn">:</td>
                        <td><?php echo $pay_list->bank_name; ?></td>

                    </tr>

                    <tr>

                        <td>Date of Joining</td>
                        <td class="left_algn">:</td>
                        <td class="left_algn"><?php if(($pay_list->joining_date != "0000-00-00") && ($pay_list->joining_date != NULL)){ echo date('d-m-Y', strtotime($pay_list->joining_date)); } ?></td>
                        <td></td>
                        <td>Location</td>
                        <td class="left_algn">:</td>
                        <td class="left_algn"><?php echo $pay_list->location; ?></td>                        

                    </tr>

                    <tr>

                        <td>Department</td>
                        <td class="left_algn">:</td>
                        <td class="left_algn"><?php echo $pay_list->department; ?></td>
                        <td></td>
                        <td>PF No.</td>
                        <td class="left_algn">:</td>
                        <td class="left_algn"><?php echo $pay_list->pf_ac_no; ?></td>                        

                    </tr>

                    <tr>

                        <td>Designation</td>
                        <td class="left_algn">:</td>
                        <td class="left_algn"><?php echo $pay_list->designation; ?></td>
                        <td></td>
                        <td>ESI NO</td>
                        <td class="left_algn">:</td>
                        <td class="left_algn"><?php echo $pay_list->esi_no; ?></td>                        

                    </tr>

                    <tr>

                        <td></td>
                        <td class="left_algn">:</td>
                        <td class="left_algn"></td>
                        <td></td>
                        <td>PAN Number</td>
                        <td class="left_algn">:</td>
                        <td class="left_algn"><?php echo $pay_list->pan_no; ?></td>                        

                    </tr>

                </table>
                <br>
                <div class="row" style="text-align:center;">
                    <div class="col-md-6">
                        <h4>Earnings</h4>
                        <hr>
                        <?php 
                        foreach($earnings as $list){
                        ?>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <p class="col-sm-4"> <strong><?php echo $list->head_desc; ?></strong></p>
                                        <div class="col-sm-1">:</div>
                                        <div class="col-sm-7">
                                            <p><?php echo $list->amount; ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <?php }?>
                    </div>
                    <div class="col-md-6">
                        <h4>Deductions</h4>
                        <hr>
                        <?php 
                        foreach($deductions as $list){
                        ?>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <p class="col-sm-4"> <strong><?php echo $list->head_desc; ?></strong></p>
                                        <div class="col-sm-1">:</div>
                                        <div class="col-sm-7">
                                            <p><?php echo $list->amount; ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <?php }?>
                    </div>
                </div>
                <div class="row" style="text-align:center;">
                    <div class="col-md-6">
                        <div class="row">
                            <p class="col-sm-4"> <strong>Total: Earning</strong></p>
                            <div class="col-sm-1">:</div>
                            <div class="col-sm-7">
                                <p><?php echo $this->input->get('earning'); ?></p>
                            </div>
                        </div>
                    </div>
                
                    <div class="col-md-6">
                        <div class="row">
                            <p class="col-sm-4"> <strong>Total: Deduction</strong></p>
                            <div class="col-sm-1">:</div>
                            <div class="col-sm-7">
                                <p><?php echo $this->input->get('deduction'); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <p class="col-sm-3"> <strong>Net Amount</strong></p>
                            <div class="col-sm-1">:</div>
                            <div class="col-sm-8">
                                <p><?php echo $this->input->get('net_amount').' ('.getIndianCurrency($this->input->get('net_amount')).')';  ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div  class="bottom">
                
                <!-- <p style="display: inline;">Authorised Sign</p>

                <p style="display: inline; margin-left: 56%;">Employee Sign</p>
 -->
            </div>
        </div>

        <div style="text-align: center;">

            <button class="btn btn-info" type="button" onclick="printDiv();">Print</button>

        </div>
        
    </div>

</div>