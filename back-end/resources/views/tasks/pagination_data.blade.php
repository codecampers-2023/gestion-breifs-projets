@foreach($tasks as $row)
      <tr>
       <td>{{ $row->id}}</td>
       <td>{{ $row->Nom_tache }}</td>
       <td>{{ $row->Description }}</td>
      </tr>
      @endforeach
      <tr>
       <td colspan="3" align="center">
        {!! $tasks->links() !!}
       </td>
      </tr>

