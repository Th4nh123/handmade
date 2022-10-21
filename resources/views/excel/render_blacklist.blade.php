<table id="example2" class="table table-bordered table-hover">
    <thead>
     <tr>
       <th width="2%">id</th>
       <th>Domain</th>
       <th>Loại</th>
     </tr>
    </thead>
    <tbody>
     @if (isset($blacklist))
     @foreach ($blacklist as $key => $item)
     <tr>
       <td>{{$key+1}}</td>
       <td>{{$item['blacklist']}}</td>
       <td>{{$item['loai']}}</td>
     </tr>
     @endforeach 
     @endif
    </tbody>
   </table>