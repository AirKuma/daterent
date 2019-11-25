@extends('layouts.master')

@section('content')

    <div class="container">
        <div class="row">
             <h1>註冊</h1><hr>

                @if($errors->has())
                <div class="alert alert-danger">
                   @foreach ($errors->all() as $error)
                      {{ $error }} <br />
                  @endforeach
                </div>
                @endif

                {!! Form::open(['route' => 'user.register', 'method' => 'post', 'role' => 'form']) !!}
                {!! Form::hidden('reg', '0') !!}
                <fieldset class="card-block">
                <legend>帳號資料</legend>
                <div class="form-group row">
                    {!! Form::label('name', '暱稱',array('class' => 'col-sm-2 form-control-label')) !!}
                    <div class="col-sm-10">
                        {!! Form::text('name', null, ['class'=> 'form-control']) !!}
                    </div>
                </div>
                 <div class="form-group row">
                    {!! Form::label('email', 'Email',array('class' => 'col-sm-2 form-control-label')) !!}
                    <div class="col-sm-10">
                        {!! Form::text('email', null, ['class'=> 'form-control']) !!}
                    </div>
                </div>
                <div class="form-group row">
                    {!! Form::label('password', '密碼',array('class' => 'col-sm-2 form-control-label')) !!}
                    <div class="col-sm-10">
                         {!! Form::password('password', ['class' => 'form-control']) !!}
                    </div>
                </div>

                <div class="form-group row">
                    {!! Form::label('password_confirmation', '確認密碼',array('class' => 'col-sm-2 form-control-label')) !!}
                    <div class="col-sm-10">
                    {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
                    </div>
                </div>
                </fieldset>
                <fieldset class="card-block">
                <legend>基本個人資訊</legend>
                <div class="form-group row">
                    {!! Form::label('gender', '性別',array('class' => 'col-sm-2 form-control-label')) !!}
                    <div class="col-sm-10">
                         <label class="checkbox-inline c-input c-radio">
                            {!! Form::radio('gender', '0') !!} 男性 
                            <span class="c-indicator"></span>
                         </label>   
                         <label class="checkbox-inline c-input c-radio">   
                            {!! Form::radio('gender', '1') !!} 女性
                            <span class="c-indicator"></span>
                         </label>   
                    </div>
                </div>
                <div class="form-group row">
                    {!! Form::label('birthday', '生日',array('class' => 'col-sm-2 form-control-label')) !!}
                    <div class="col-sm-10">
                        {!! Form::date('birthday', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
                 <div class="form-group row">
                    {!! Form::label('height', '身高',array('class' => 'col-sm-2 form-control-label')) !!}
                    <div class="col-sm-10">
                        <div class="input-group">
                            {!! Form::number('height', null, ['class'=> 'form-control']) !!}
                            <span class="input-group-addon">公分</span>
                        </div>
                    </div>
                </div>
                 <div class="form-group row">
                    {!! Form::label('weight', '體重',array('class' => 'col-sm-2 form-control-label')) !!}
                    <div class="col-sm-10">
                        <div class="input-group">
                            {!! Form::number('weight', null, ['class'=> 'form-control']) !!}
                            <span class="input-group-addon">公斤</span>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    {!! Form::label('nationality', '國籍',array('class' => 'col-sm-2 form-control-label')) !!}
                    <div class="col-sm-10">
                        {!! Form::select('nationality', ['臺灣','中國','香港','澳門','日本','韓國','俄羅斯','蒙古國','越南','寮國','柬埔寨','泰國','緬甸','菲律賓','新加坡','汶萊','印尼','東帝汶','馬來西亞','印度','不丹','孟加拉國','尼泊爾','巴基斯坦','斯里蘭卡','馬爾地夫','亞美尼亞','亞塞拜然','巴林','賽普勒斯','喬治亞','伊朗','伊拉克','以色列','約旦','科威特','黎巴嫩','阿曼','巴勒斯坦','卡達','沙烏地阿拉伯','敘利亞','阿聯','葉門','土耳其','哈薩克','吉爾吉斯','塔吉克','土庫曼','烏茲別克','阿富汗','俄羅斯','美國','加拿大','墨西哥','哥斯大黎加','古巴','格陵蘭','瓜地馬拉','宏都拉斯','尼加拉瓜','巴拿馬','其他北美洲國家','阿根廷','玻利維亞','巴西','智利','哥倫比亞','厄瓜多','福克蘭群島','法屬蓋亞那','蓋亞那','巴拉圭','秘魯','蘇利南','烏拉圭','委內瑞拉','英國','法國','愛爾蘭','荷蘭','比利時','盧森堡','摩納哥','澤西','根西','曼島','波蘭','瑞士','列支敦斯登','奧地利','匈牙利','捷克','斯洛伐克','斯洛維尼亞','德國','葡萄牙','西班牙','安道爾','希臘','義大利','聖馬利諾','馬爾他','梵蒂岡','保加利亞','羅馬尼亞','塞爾維亞','克羅埃西亞','波士尼亞與赫塞哥維納','蒙特內哥羅','阿爾巴尼亞','馬其頓','直布羅陀','丹麥','挪威','冰島','芬蘭','瑞典','法羅群島','布韋島','烏克蘭','白俄羅斯','立陶宛','拉脫維亞','愛沙尼亞','摩爾多瓦','澳洲','紐西蘭','其他大洋洲國家','南極洲國家','阿爾及利亞','中非','剛果','象牙海岸','埃及','衣索比亞','幾內亞','肯亞','摩洛哥','尼日','獅子山','南非','蘇丹','坦尚尼亞','烏干達','尚比亞','辛巴威','其他非洲國家'], null, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="form-group row">
                    {!! Form::label('city', '所在城市',array('class' => 'col-sm-2 form-control-label')) !!}
                    <div class="col-sm-10">
                    {!! Form::select('city', ['選擇城市','臺北市','新北市','桃園市','臺中市','臺南市','高雄市','基隆市','新竹市','新竹縣','苗栗縣','彰化縣','南投縣','雲林縣','嘉義縣','屏東縣','宜蘭縣','花蓮縣','臺東縣','澎湖縣','金門縣','連江縣','其他'], null, ['class' => 'form-control']) !!}                   
                    </div>      
                </div>
                <div class="form-group row">
                    {!! Form::label('degree', '學歷',array('class' => 'col-sm-2 form-control-label')) !!}
                    <div class="col-sm-10">
                    {!! Form::select('degree', ['國中','高中/高職','五專','大學/技術學院','碩士','博士'], null, ['class' => 'form-control']) !!}                   
                    </div>      
                </div>
                <div class="form-group row">
                    {!! Form::label('careerclass', '職業分類',array('class' => 'col-sm-2 form-control-label')) !!}
                    <div class="col-sm-10">
                    {!! Form::select('careerclass', ['一般職業','農牧業','漁業','林材森林業','礦業採石業','交通運輸業','餐旅業','建築工程業','製造業','新聞廣告業','衛生保健業','娛樂業','文教機構','宗教團體','公共事業','一般商業','服務業','家庭管理','治安人員','軍人','資訊業','職業運動人員','其他'], null, ['class' => 'form-control']) !!}                   
                    </div>      
                </div>
                <div class="form-group row">
                    {!! Form::label('career', '職業',array('class' => 'col-sm-2 form-control-label')) !!}
                    <div class="col-sm-10">
                    {!! Form::text('career', null, ['class'=> 'form-control']) !!}
                    </div>      
                </div>
                <div class="form-group row">
                    {!! Form::label('introduction', '自我介紹',array('class' => 'col-sm-2 form-control-label')) !!}
                    <div class="col-sm-10">
                    {!! Form::textarea('introduction',null,array('class' => 'form-control')) !!} </p >
                    <p class="help-block">上限255字</p>
                    </div>      
                </div>
                <div class="form-group row">
                    {!! Form::label('ideal', '理想對象',array('class' => 'col-sm-2 form-control-label')) !!}
                    <div class="col-sm-10">
                    {!! Form::textarea('ideal',null,array('class' => 'form-control')) !!} </p >
                    <p class="help-block">上限150字</p>
                    </div>      
                </div>
                {!! Form::submit('註冊', ['class' => 'btn btn-primary']) !!}
                {!! Form::reset('清除', ['class' => 'btn btn-info']) !!}
                </fieldset>
                {!! Form::close() !!}
        </div>

    </div>

@endsection