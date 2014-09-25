<?php

function pro_select($value, $data) {
    if ($value == $data) {
        return ' selected';
    }
}

function pro_list_th($data) {
    return '
    <select class="form-control" name="province_th" id="province_th">
      <option value=""' . pro_select("", $data) . '>--------- เลือกจังหวัด ---------</option>
      <option value="กรุงเทพมหานคร"' . pro_select('กรุงเทพมหานคร', $data) . '>กรุงเทพมหานคร</option>
      <option value="กระบี่"' . pro_select('กระบี่', $data) . '>กระบี่ </option>
      <option value="กาญจนบุรี"' . pro_select('กาญจนบุรี', $data) . '>กาญจนบุรี </option>
      <option value="กาฬสินธุ์"' . pro_select('กาฬสินธุ์', $data) . '>กาฬสินธุ์ </option>
      <option value="กำแพงเพชร"' . pro_select('กำแพงเพชร', $data) . '>กำแพงเพชร </option>
      <option value="ขอนแก่น"' . pro_select('ขอนแก่น', $data) . '>ขอนแก่น</option>
      <option value="จันทบุรี"' . pro_select('จันทบุรี', $data) . '>จันทบุรี</option>
      <option value="ฉะเชิงเทรา"' . pro_select('ฉะเชิงเทรา', $data) . '>ฉะเชิงเทรา </option>
      <option value="ชัยนาท"' . pro_select('ชัยนาท', $data) . '>ชัยนาท </option>
      <option value="ชัยภูมิ"' . pro_select('ชัยภูมิ', $data) . '>ชัยภูมิ </option>
      <option value="ชุมพร"' . pro_select('ชุมพร', $data) . '>ชุมพร </option>
      <option value="ชลบุรี"' . pro_select('ชลบุรี', $data) . '>ชลบุรี </option>
      <option value="เชียงใหม่"' . pro_select('เชียงใหม่', $data) . '>เชียงใหม่ </option>
      <option value="เชียงราย"' . pro_select('เชียงราย', $data) . '>เชียงราย </option>
      <option value="ตรัง"' . pro_select('ตรัง', $data) . '>ตรัง </option>
      <option value="ตราด"' . pro_select('ตราด', $data) . '>ตราด </option>
      <option value="ตาก"' . pro_select('ตาก', $data) . '>ตาก </option>
      <option value="นครนายก"' . pro_select('นครนายก', $data) . '>นครนายก </option>
      <option value="นครปฐม"' . pro_select('นครปฐม', $data) . '>นครปฐม </option>
      <option value="นครพนม"' . pro_select('นครพนม', $data) . '>นครพนม </option>
      <option value="นครราชสีมา"' . pro_select('นครราชสีมา', $data) . '>นครราชสีมา </option>
      <option value="นครศรีธรรมราช"' . pro_select('นครศรีธรรมราช', $data) . '>นครศรีธรรมราช </option>
      <option value="นครสวรรค์"' . pro_select('นครสวรรค์', $data) . '>นครสวรรค์ </option>
      <option value="นราธิวาส"' . pro_select('นราธิวาส', $data) . '>นราธิวาส </option>
      <option value="น่าน"' . pro_select('น่าน', $data) . '>น่าน </option>
      <option value="นนทบุรี"' . pro_select('นนทบุรี', $data) . '>นนทบุรี </option>
      <option value="บึงกาฬ"' . pro_select('บึงกาฬ', $data) . '>บึงกาฬ</option>
      <option value="บุรีรัมย์"' . pro_select('บุรีรัมย์', $data) . '>บุรีรัมย์</option>
      <option value="ประจวบคีรีขันธ์"' . pro_select('ประจวบคีรีขันธ์', $data) . '>ประจวบคีรีขันธ์ </option>
      <option value="ปทุมธานี"' . pro_select('ปทุมธานี', $data) . '>ปทุมธานี </option>
      <option value="ปราจีนบุรี"' . pro_select('ปราจีนบุรี', $data) . '>ปราจีนบุรี </option>
      <option value="ปัตตานี"' . pro_select('ปัตตานี', $data) . '>ปัตตานี </option>
      <option value="พะเยา"' . pro_select('พะเยา', $data) . '>พะเยา </option>
      <option value="พระนครศรีอยุธยา"' . pro_select('พระนครศรีอยุธยา', $data) . '>พระนครศรีอยุธยา </option>
      <option value="พังงา"' . pro_select('พังงา', $data) . '>พังงา </option>
      <option value="พิจิตร"' . pro_select('พิจิตร', $data) . '>พิจิตร </option>
      <option value="พิษณุโลก"' . pro_select('พิษณุโลก', $data) . '>พิษณุโลก </option>
      <option value="เพชรบุรี"' . pro_select('เพชรบุรี', $data) . '>เพชรบุรี </option>
      <option value="เพชรบูรณ์"' . pro_select('เพชรบูรณ์', $data) . '>เพชรบูรณ์ </option>
      <option value="แพร่"' . pro_select('แพร่', $data) . '>แพร่ </option>
      <option value="พัทลุง"' . pro_select('พัทลุง', $data) . '>พัทลุง </option>
      <option value="ภูเก็ต"' . pro_select('ภูเก็ต', $data) . '>ภูเก็ต </option>
      <option value="มหาสารคาม"' . pro_select('มหาสารคาม', $data) . '>มหาสารคาม </option>
      <option value="มุกดาหาร"' . pro_select('มุกดาหาร', $data) . '>มุกดาหาร </option>
      <option value="แม่ฮ่องสอน"' . pro_select('แม่ฮ่องสอน', $data) . '>แม่ฮ่องสอน </option>
      <option value="ยโสธร"' . pro_select('ยโสธร', $data) . '>ยโสธร </option>
      <option value="ยะลา"' . pro_select('ยะลา', $data) . '>ยะลา </option>
      <option value="ร้อยเอ็ด"' . pro_select('ร้อยเอ็ด', $data) . '>ร้อยเอ็ด </option>
      <option value="ระนอง"' . pro_select('ระนอง', $data) . '>ระนอง </option>
      <option value="ระยอง"' . pro_select('ระยอง', $data) . '>ระยอง </option>
      <option value="ราชบุรี"' . pro_select('ราชบุรี', $data) . '>ราชบุรี</option>
      <option value="ลพบุรี"' . pro_select('ลพบุรี', $data) . '>ลพบุรี </option>
      <option value="ลำปาง"' . pro_select('ลำปาง', $data) . '>ลำปาง </option>
      <option value="ลำพูน"' . pro_select('ลำพูน', $data) . '>ลำพูน </option>
      <option value="เลย"' . pro_select('เลย', $data) . '>เลย </option>
      <option value="ศรีสะเกษ"' . pro_select('ศรีสะเกษ', $data) . '>ศรีสะเกษ</option>
      <option value="สกลนคร"' . pro_select('สกลนคร', $data) . '>สกลนคร</option>
      <option value="สงขลา"' . pro_select('สงขลา', $data) . '>สงขลา </option>
      <option value="สมุทรสาคร"' . pro_select('สมุทรสาคร', $data) . '>สมุทรสาคร </option>
      <option value="สมุทรปราการ"' . pro_select('สมุทรปราการ', $data) . '>สมุทรปราการ </option>
      <option value="สมุทรสงคราม"' . pro_select('สมุทรสงคราม', $data) . '>สมุทรสงคราม </option>
      <option value="สระแก้ว"' . pro_select('สระแก้ว', $data) . '>สระแก้ว </option>
      <option value="สระบุรี"' . pro_select('สระบุรี', $data) . '>สระบุรี </option>
      <option value="สิงห์บุรี"' . pro_select('สิงห์บุรี', $data) . '>สิงห์บุรี </option>
      <option value="สุโขทัย"' . pro_select('สุโขทัย', $data) . '>สุโขทัย </option>
      <option value="สุพรรณบุรี"' . pro_select('สุพรรณบุรี', $data) . '>สุพรรณบุรี </option>
      <option value="สุราษฎร์ธานี"' . pro_select('สุราษฎร์ธานี', $data) . '>สุราษฎร์ธานี </option>
      <option value="สุรินทร์"' . pro_select('สุรินทร์', $data) . '>สุรินทร์ </option>
      <option value="สตูล"' . pro_select('สตูล', $data) . '>สตูล </option>
      <option value="หนองคาย"' . pro_select('หนองคาย', $data) . '>หนองคาย </option>
      <option value="หนองบัวลำภู"' . pro_select('หนองบัวลำภู', $data) . '>หนองบัวลำภู </option>
      <option value="อำนาจเจริญ"' . pro_select('อำนาจเจริญ', $data) . '>อำนาจเจริญ </option>
      <option value="อุดรธานี"' . pro_select('อุดรธานี', $data) . '>อุดรธานี </option>
      <option value="อุตรดิตถ์"' . pro_select('อุตรดิตถ์', $data) . '>อุตรดิตถ์ </option>
      <option value="อุทัยธานี"' . pro_select('อุทัยธานี', $data) . '>อุทัยธานี </option>
      <option value="อุบลราชธานี"' . pro_select('อุบลราชธานี', $data) . '>อุบลราชธานี</option>
      <option value="อ่างทอง"' . pro_select('อ่างทอง', $data) . '>อ่างทอง </option>
      <option value="อื่นๆ"' . pro_select('อื่นๆ', $data) . '>อื่นๆ</option>
</select>
    ';
}
?>

<?php

// $province_en = array("Amnat Charoen", "Ang Thong", "Buriram", "Chachoengsao", "Chai Nat", "Chaiyaphum", "Chanthaburi", "Chiang Mai", "Chiang Rai", "Chon Buri", "Chumphon", "Kalasin", "Kamphaeng Phet", "Kanchanaburi", "Khon Kaen", "Krabi", "Krung Thep Mahanakhon", "Lampang", "Lamphun", "Loei", "Lop Buri", "Mae Hong Son", "Maha Sarakham", "Mukdahan", "Nakhon Nayok", "Nakhon Pathom", "Nakhon Phanom", "Nakhon Ratchasima", "Nakhon Sawan", "Nakhon Si Thammarat", "Nan", "Narathiwat", "Nong Bua Lamphu", "Nong Khai", "Nonthaburi", "Pathum Thani", "Pattani", "Phangnga", "Phatthalung", "Phayao", "Phetchabun", "Phetchaburi", "Phichit", "Phitsanulok", "Phra Nakhon Si Ayutthaya", "Phrae", "Phuket", "Prachin Buri", "Prachuap Khiri Khan", "Ranong", "Ratchaburi", "Rayong", "Roi Et", "Sa Kaeo", "Sakon Nakhon", "Samut Prakan", "Samut Sakhon", "Samut Songkhram", "Sara Buri", "Satun", "Sing Buri", "Sisaket", "Songkhla", "Sukhothai", "Suphan Buri", "Surat Thani", "Surin", "Tak", "Trang", "Trat", "Ubon Ratchathani", "Udon Thani", "Uthai Thani", "Uttaradit", "Yala", "Yasothon");

$province_en = array("Amnat Charoen", "Ang Thong", "Bangkok", "Buriram", "Chachoengsao", "Chai Nat", "Chaiyaphum", "Chanthaburi", "Chiang Mai", "Chiang Rai", "Chon Buri", "Chumphon", "Kalasin", "Kamphaeng Phet", "Kanchanaburi", "Khon Kaen", "Krabi", "Lampang", "Lamphun", "Loei", "Lop Buri", "Mae Hong Son", "Maha Sarakham", "Mukdahan", "Nakhon Nayok", "Nakhon Pathom", "Nakhon Phanom", "Nakhon Ratchasima", "Nakhon Sawan", "Nakhon Si Thammarat", "Nan", "Narathiwat", "Nong Bua Lamphu", "Nong Khai", "Nonthaburi", "Pathum Thani", "Pattani", "Phangnga", "Phatthalung", "Phayao", "Phetchabun", "Phetchaburi", "Phichit", "Phitsanulok", "Phra Nakhon Si Ayutthaya", "Phrae", "Phuket", "Prachin Buri", "Prachuap Khiri Khan", "Ranong", "Ratchaburi", "Rayong", "Roi Et", "Sa Kaeo", "Sakon Nakhon", "Samut Prakan", "Samut Sakhon", "Samut Songkhram", "Sara Buri", "Satun", "Sing Buri", "Sisaket", "Songkhla", "Sukhothai", "Suphan Buri", "Surat Thani", "Surin", "Tak", "Trang", "Trat", "Ubon Ratchathani", "Udon Thani", "Uthai Thani", "Uttaradit", "Yala", "Yasothon");

?>

<?php $province = '
  <option value="" selected>--------- เลือกจังหวัด ---------</option>
  <option value="กรุงเทพมหานคร">กรุงเทพมหานคร</option>
  <option value="กระบี่">กระบี่ </option>
  <option value="กาญจนบุรี">กาญจนบุรี </option>
  <option value="กาฬสินธุ์">กาฬสินธุ์ </option>
  <option value="กำแพงเพชร">กำแพงเพชร </option>
  <option value="ขอนแก่น">ขอนแก่น</option>
  <option value="จันทบุรี">จันทบุรี</option>
  <option value="ฉะเชิงเทรา">ฉะเชิงเทรา </option>
  <option value="ชัยนาท">ชัยนาท </option>
  <option value="ชัยภูมิ">ชัยภูมิ </option>
  <option value="ชุมพร">ชุมพร </option>
  <option value="ชลบุรี">ชลบุรี </option>
  <option value="เชียงใหม่">เชียงใหม่ </option>
  <option value="เชียงราย">เชียงราย </option>
  <option value="ตรัง">ตรัง </option>
  <option value="ตราด">ตราด </option>
  <option value="ตาก">ตาก </option>
  <option value="นครนายก">นครนายก </option>
  <option value="นครปฐม">นครปฐม </option>
  <option value="นครพนม">นครพนม </option>
  <option value="นครราชสีมา">นครราชสีมา </option>
  <option value="นครศรีธรรมราช">นครศรีธรรมราช </option>
  <option value="นครสวรรค์">นครสวรรค์ </option>
  <option value="นราธิวาส">นราธิวาส </option>
  <option value="น่าน">น่าน </option>
  <option value="นนทบุรี">นนทบุรี </option>
  <option value="บึงกาฬ">บึงกาฬ</option>
  <option value="บุรีรัมย์">บุรีรัมย์</option>
  <option value="ประจวบคีรีขันธ์">ประจวบคีรีขันธ์ </option>
  <option value="ปทุมธานี">ปทุมธานี </option>
  <option value="ปราจีนบุรี">ปราจีนบุรี </option>
  <option value="ปัตตานี">ปัตตานี </option>
  <option value="พะเยา">พะเยา </option>
  <option value="พระนครศรีอยุธยา">พระนครศรีอยุธยา </option>
  <option value="พังงา">พังงา </option>
  <option value="พิจิตร">พิจิตร </option>
  <option value="พิษณุโลก">พิษณุโลก </option>
  <option value="เพชรบุรี">เพชรบุรี </option>
  <option value="เพชรบูรณ์">เพชรบูรณ์ </option>
  <option value="แพร่">แพร่ </option>
  <option value="พัทลุง">พัทลุง </option>
  <option value="ภูเก็ต">ภูเก็ต </option>
  <option value="มหาสารคาม">มหาสารคาม </option>
  <option value="มุกดาหาร">มุกดาหาร </option>
  <option value="แม่ฮ่องสอน">แม่ฮ่องสอน </option>
  <option value="ยโสธร">ยโสธร </option>
  <option value="ยะลา">ยะลา </option>
  <option value="ร้อยเอ็ด">ร้อยเอ็ด </option>
  <option value="ระนอง">ระนอง </option>
  <option value="ระยอง">ระยอง </option>
  <option value="ราชบุรี">ราชบุรี</option>
  <option value="ลพบุรี">ลพบุรี </option>
  <option value="ลำปาง">ลำปาง </option>
  <option value="ลำพูน">ลำพูน </option>
  <option value="เลย">เลย </option>
  <option value="ศรีสะเกษ">ศรีสะเกษ</option>
  <option value="สกลนคร">สกลนคร</option>
  <option value="สงขลา">สงขลา </option>
  <option value="สมุทรสาคร">สมุทรสาคร </option>
  <option value="สมุทรปราการ">สมุทรปราการ </option>
  <option value="สมุทรสงคราม">สมุทรสงคราม </option>
  <option value="สระแก้ว">สระแก้ว </option>
  <option value="สระบุรี">สระบุรี </option>
  <option value="สิงห์บุรี">สิงห์บุรี </option>
  <option value="สุโขทัย">สุโขทัย </option>
  <option value="สุพรรณบุรี">สุพรรณบุรี </option>
  <option value="สุราษฎร์ธานี">สุราษฎร์ธานี </option>
  <option value="สุรินทร์">สุรินทร์ </option>
  <option value="สตูล">สตูล </option>
  <option value="หนองคาย">หนองคาย </option>
  <option value="หนองบัวลำภู">หนองบัวลำภู </option>
  <option value="อำนาจเจริญ">อำนาจเจริญ </option>
  <option value="อุดรธานี">อุดรธานี </option>
  <option value="อุตรดิตถ์">อุตรดิตถ์ </option>
  <option value="อุทัยธานี">อุทัยธานี </option>
  <option value="อุบลราชธานี">อุบลราชธานี</option>
  <option value="อ่างทอง">อ่างทอง </option>
  <option value="อื่นๆ">อื่นๆ</option>  
 ';
?>