@if((isset($document_size) && $document_size != 'a5'))
    <div class="row" ></div>
@else
    <div class="row" ></div>
@endif
<div class="row">
{{--=========== logo  ============--}}
    <div class="col-xs-4"> 
        @if($companyinfo->logo && $companyinfo->logo != "")
            <?php
                $logo_type = '';
                if (isset($_SERVER['HTTPS'])) {
                    $link = 'https://';
                } else {
                    $link = 'http://';
                }
                $http_host = $link . \Request::server('HTTP_HOST');
                $logo = str_replace($http_host, '', $companyinfo->logo);
                list($width, $height) = getimagesize(public_path($logo));
                if ($width > $height) {
                    $logo_type = 'document-logo-Landscape';
                } else {
                    $logo_type = 'document-logo-Portrait';
                }    
            ?>
            <div>
                  <img src="{{ $companyinfo->logo }}" class="img-responsive {{ $logo_type }} " alt=""/>
            </div>
        @endif
    </div> 
    {{--=========== name company ============--}}
        <div class="col-xs-4">
            <h3 class="bold text-center title_eng">{{$companyinfo->name_2}}</h3>
            <h5 class=" bold text-center title_kh">{{$companyinfo->address}}</h5>
        </div>  
    <div class="col-xs-4"></div>
</div>
    <div class="row">
        <div class="col-xs-9"><h3 class="title-name-cp">{{$companyinfo->name}}</h3></div>
        <div class="col-xs-3 text-right date"><h5>N<sup>o</sup>:{{$header->no}}<br><span><h5>Date:{{$header->document_date}}</h5></span></h5></div>
    </div>
    <div class="row">
        <div class="col-xs-3 date"><h5>{{$companyinfo->address_2}}</h5></div>
        <div class="col-xs-6 text-center p-3"><h4 class="bold invoic">{{ $title_eng ?? '' }}<br><span>{{ $title_kh ?? '' }}</span></h4></div>
        <div class="col-xs-3 text-right date"><h5>Tel : 012 721 311 <br><span>  : 078 583 168 <br>  : 010 264 834</span></h5></div>
    </div>
    <div class="row">
    <div class="col-xs-2"></div>
</div>
<div class="row">
    <table>
        <thead>
            <tr class="general-data bg-color">
                <th width="20px"><div class="text-center">ល.រ​ <br><span>N<sup>o</sup></span></div></th>
                <th width="103px"><div class="text-center">រូបភាព <br><span>image</span></div></th>
                <th width="297px"><div class="text-center">ឈ្មោះទំនិញ​ <br><span>Name of Goods</span></div></th>
                <th width="70px"><div class="text-center" style="white-space: nowrap !important;">ចំនួន <br><span>Quantity</span></div></th>
                <th width="80px"><div class="text-center">តំលៃរាយ <br><span>Unit Price</span></div></th>
                <th width="80px"><div class="text-center">តំលៃសរុប <br><span>Amount</span></div></th>
            </tr>
        </thead>
        <?php $i = 0; ?>
        <tbody>
            @if($lines)
                @foreach($lines as $line)
                    <?php
                        $counter += 1;
                        $i = $i + 1; 
                        if($line->no){
                            $index += 1;
                        }
                        if($line->type == 'Text'){
                            $class_name = 'bd-left bd-right';
                        }else{
                            $class_name = 'bd-left bd-right bd-top';
                        }
                        $boder_bottom = '';
                        if($counter == $count_record_item){
                            $boder_bottom = 'last-bd-bottom';
                        }
                        $item_group = null;
                        $line->currency = $currency; 
                        $item = App\Models\Administration\ApplicationSetup\Item::where('no', $line->no)->where('inactived', '<>', 'Yes')->first();
                        if($line->type == 'Item') $item_group = $item->item_group_code ? $item->item_group_code : ' ';
                        $amount_inc_fee = 0;
                    ?>
                   
                    @if($line->type == 'Text')
                        <tr class="general-data">
                            <td class="text-left {{ $class_name }} {{ $boder_bottom }}"><p></p></td>
                            <td class="text-left {{ $class_name }} {{ $boder_bottom }}"><p></p></td>
                            <td class="text-left {{ $class_name }} {{ $boder_bottom }} "><p class="text-spc" >{{ ($line->description) ? $line->description : '' }}</p></td>
                            <td class="text-center {{ $class_name }} {{ $boder_bottom }}"><p class="text-qty">{{ ($line->quantity) ? App\Services\service::custome_number_formattor($line->quantity, 'quantity', $currency) : '' }} </p></td>
                            <td class="text-right {{ $class_name }} {{ $boder_bottom }}"><p class="text-price">{{ ($line->unit_price) ? App\Services\service::number_formattor($line->unit_price, 'amount', $currency) : '' }} {{ $currencySign }}</p></td>
                            <td class="text-right {{ $class_name }} {{ $boder_bottom }}"><p class="text-price">{{ ($line->amount) ? App\Services\service::number_formattor($line->amount, 'amount', $currency) : '' }} {{ $currencySign }}</p></td>
                        </tr>
                    @else
                        <tr class="general-data">
                            <td class="text-center {{ $class_name }} {{ $boder_bottom }}"><p class="no">{{ $index }}</p></td>
                            <td class="{{ $class_name }} {{ $boder_bottom }}"> 
                                <img src="{{ (isset($item) && $item->picture !='')? $item->picture : '/img/no_picture.jpg'}}" alt="" class="Image-item">
                            </td>
                            <td class="text-left bold {{ $class_name }} {{ $boder_bottom }}"><p class="description">{{ ($line->description) ? $line->description : '' }}</p></td>
                            <td class="text-center {{ $class_name }} {{ $boder_bottom }}"><p></p></td></td></td>
                            <td class="text-center {{ $class_name }} {{ $boder_bottom }}"><p></p></td>
                            <td class="text-center {{ $class_name }} {{ $boder_bottom }}"><p></p></td>
                        </tr>
                    @endif
                @endforeach
                @if($amountDue != $subTotal) 
                <?php $margin_top_noted == 1; ?>
                <tr class="total">
                    <td></td>
                    <td colspan="2"></td>
                    <td class="bd-left bd-bottom bd-right text-left"  colspan="2">សរុប <br><span>Sub Total</span></td>
                    <td class="bd-bottom bd-right text-right">
                        <div class="text-right item-total"><span>{{ App\Services\service::number_formattor($subTotal, 'amount',$currency) }} {{ $currencySign }}</span></div>
                    </td>
                </tr>   
                @endif
                @if($discountTotal > 0)
                <?php $margin_top_noted += 1; ?>
                <tr class="total">
                    <td></td>
                    <td colspan="2"></td>
                    <td class="bd-left bd-bottom bd-right text-left"  colspan="2">Discount <br><span>បញ្ចុះតម្លៃ</span></td>
                    <td class="bd-bottom bd-right text-right">
                        <div class="text-right item-total"><span>{{ App\Services\service::number_formattor($discountTotal, 'amount',$currency) }} {{ $currencySign }}</span></div>
                    </td>
                </tr>   
                @endif
                @if($vatTotal > 0)
                <?php $margin_top_noted += 1; ?>
                <tr class="total">
                    <td></td>
                    <td colspan="2"></td>
                    <td class="bd-left bd-bottom bd-right text-left"  colspan="2">VAT Amount <br><span>ពន្ធ អាករ</span></td>
                    <td class="bd-bottom bd-right text-right">
                        <div class="text-right item-total"><span>{{ App\Services\service::number_formattor($vatTotal, 'amount',$currency) }} {{ $currencySign }}</span></div>
                    </td>
                </tr>   
                @endif
                @if(isset($paid_amount) && $paid_amount >0)
                <?php $margin_top_noted += 1; ?>
                <tr class="total">
                    <td></td>
                    <td colspan="2"></td>
                    <td class="bd-left bd-bottom bd-right text-left" colspan="2">ប្រាក់កក់ ឬ ប្រាក់ទទួល<br><span>Deposit</span></td>
                    <td class="bd-bottom bd-right text-right">
                        <div class="text-right item-total"><span>{{ App\Services\service::number_formattor($paid_amount, 'amount', $currency) }} {{ $currencySign }}</span></div>
                    </td>
                </tr> 
                @endif
                <?php $margin_top_noted += 1; ?>
                <tr class="total">
                    <td></td>
                    <td colspan="2"></td>
                    <td class="bd-left bd-bottom bd-right text-left" colspan="2">នៅខ្វះ <br><span>Amount Due</span></td>
                    <td class="bd-bottom bd-right text-right">
                        <div class="text-right item-total"><span>{{ App\Services\service::number_formattor($amountDue, 'amount', $currency) }} {{ $currencySign }}</span></div>
                    </td>
                </tr> 
            @endif        
        <tbody>
    </table>
</div>
<div class="row">
    <?php
        if($margin_top_noted == 0){
            $document_note_row = 'document-note-row1';
        }else if($margin_top_noted == 1){
            $document_note_row = 'document-note-row2';
        }else if($margin_top_noted == 2){
            $document_note_row = 'document-note-row3';
        }else if($margin_top_noted == 3){
            $document_note_row = 'document-note-row4';
        }else{
            $document_note_row = 'document-note-row5';
        }
    ?>
    <div class="col-xs-6 {{ $document_note_row }}" >
        {{--================== Document Note  ==================--}}
        @if(isset($header['remark']) && $header['remark'])
            <div class="bg-color" style="font-size: 50px"><b><span>{{ (isset($document_notes->description)) ? $document_notes->description : 'Noted' }}</span></b> </div><br>
            <div class="term_of_conditions">
               <?= $header['remark'] ?>
            </div>
        @else
            @if(isset($document_notes->description))
                <div class="bg-color"><b><span>{{ $document_notes->description }}</span></b></div><br>
                <div class="term_of_conditions">
                    @if($document_notes->notes)
                        <?= $document_notes->notes ?>
                    @endif
                </div>
            @endif    
        @endif
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="col-xs-6">
           
            <br><br>
            <div class="row signature-content">&nbsp;</div><br>
            <div class="col-xs-12 f-10pt  text-center">អ្នកលក់ / The Saller</div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="col-xs-6">
            
            <br><br>
            <div class="row signature-content">&nbsp;</div><br>
            <div class="col-xs-12 f-10pt  text-center">អ្នកទិញ / The Buyer</div>
        </div>
    </div>
</div>