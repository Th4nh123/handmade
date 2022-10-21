<table id="example2" class="table table-bordered table-hover">
    <thead>
     <tr>
       <th width="2%">id</th>
       <th>Tiền tố</th>
       <th>Key Cha</th>
       <th>Hậu tố</th>
       <th>Key cha 1</th> 
       <th>Key cha 2</th> 
       <th>Key cha 3</th> 
       <th>Key cha 4</th> 
       <th>TopView</th> 
       <th>TopView</th> 
       <th>TopView</th> 
       <th>TopView</th> 
     </tr>
    </thead>
    <tbody>
        @foreach ($key_render as $key => $item)
            <tr>
                <td>{{$key+1}}</td>
                <td>{{$item['Tien_to']}}</td>
                <td>{{$item['KeyCha']}}</td>
                <td>{{$item['Hau_To']}}</td>
                <td>{{$item['KeyCha1']}}</td>
                <td>{{$item['KeyCha2']}}</td>
                <td>{{$item['KeyCha3']}}</td>
                <td>{{$item['KeyCha4']}}</td>
                <td>{{$item['TopView']}}</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        @endforeach
    </tbody>
</table>