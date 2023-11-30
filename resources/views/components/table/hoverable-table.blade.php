<!-- Hoverable Table rows -->
<div class="card">
    <h5 class="card-header">{{ $title }}</h5>
    <div class="table-responsive text-nowrap">
        <table class="table table-hover">
            <thead>
                <tr>
                    @foreach ($headings as $heading)
                        <th>{{ $heading }}</th>
                    @endforeach

                    @if ($actions != [])
                        <th>Actions</th>
                    @endif
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach ($models as $model)
                    <tr>
                        @foreach ($properties as $prop)
                            @if ($prop == 'status')
                                <td>
                                    @if ($model->$prop == 'PENDING')
                                        <span class="badge rounded-pill bg-label-warning">
                                            Pending
                                        </span>
                                    @elseif ($model->$prop == 'DELIVERED')
                                        <span class="badge rounded-pill bg-label-success">
                                            Delivered
                                        </span>
                                    @elseif ($model->$prop == 'CANCELLED')
                                        <span class="badge rounded-pill bg-label-danger">
                                            Cancelled
                                        </span>
                                    @endif
                                </td>
                            @elseif ($prop == 'user')
                                <td>{{ $model->$prop->name }}</td>
                            @else
                                <td>{{ $model->$prop }}</td>
                            @endif
                        @endforeach

                        @if ($actions != [])
                            <td>
                                <div class="dropdown">
                                    
                                    <button type="button" 
                                            class="btn p-0 dropdown-toggle hide-arrow" 
                                            data-bs-toggle="dropdown"
                                    >
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    
                                    <div class="dropdown-menu">
                                        @for ($i = 0; $i < count($actions); $i++) 
                                            @php 
                                                $action=$actions[$i]; $actionRoute=$actionRoutes[$i]; 
                                            @endphp 

                                            @if ($action=='Delete') 
                                                @can('delete', $model)
                                                <form class="dropdown-item" 
                                                        action="{{route($actionRoute, $model)}}" 
                                                        method="POST"
                                                >
                                                    @csrf
                                                    @method('DELETE')
                                                    <i class="bx bx-edit-alt me-1"></i>
                                                    <input type="submit" 
                                                            value="Delete" 
                                                            onclick="return confirm('Are you sure you want to delete this item?');"
                                                            style="background-color: transparent; border: none; color: #ff817b"
                                                    >
                                                </form>
                                                @endcan
                                            @elseif($action == 'Edit')
                                                @can('update', $model)
                                                <a class="dropdown-item" 
                                                    href="{{ route($actionRoute, $model->id) }}"
                                                >
                                                    <i class="bx bx-edit-alt me-1"></i> 
                                                    {{ $action }}
                                                </a>
                                                @endcan
                                            @elseif($action == 'Show')
                                                <a class="dropdown-item" 
                                                    href="{{ route($actionRoute, $model->id) }}"
                                                >
                                                    <i class="bx bx-edit-alt me-1"></i> 
                                                    {{ $action }}
                                                </a>
                                            @else
                                                <a class="dropdown-item" 
                                                    href="{{ $actionRoute }}"
                                                >
                                                    <i class="bx bx-edit-alt me-1"></i> 
                                                    {{ $action }}
                                                </a>
                                            @endif
                                        @endfor
                                    </div>
                                </div>
                            </td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<!--/ Hoverable Table rows -->