<div class="card-body">
    <div style="margin-bottom: 10px;">
        <button type="button" class="modal-effect btn btn-success" wire:click="show_add_form">
            <i class="ti-plus"></i> اضافه ولي أمر
        </button>
    </div>
    <hr>
    <div class="table-responsive">
        <table id="datatable" class="table table-striped table-bordered p-0">
            <thead>
                <tr>
                    <th>#</th>
                    <th>البريد الالكتروني</th>
                    <th>اسم الاب</th>
                    <th>رقم الهويه</th>
                    <th>رقم جواز السفر</th>
                    <th>الهاتف</th>
                    <th>الوظيفه</th>
                    <th>العنوان</th>
                    <th>العمليات</th>
                </tr>
            </thead>
            <tbody>
            <?php $i = 1; ?>
            @foreach($all_parent as $parent)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $parent->email }}</td>
                    <td>{{ $parent->father_name }}</td>
                    <td>{{ $parent->father_id }}</td>
                    <td>{{ $parent->father_passport }}</td>
                    <td>{{ $parent->father_phone }}</td>
                    <td>{{ $parent->father_job }}</td>
                    <td>{{ $parent->father_address }}</td>
                    <td>
                        <button class="btn btn-primary btn-sm" wire:click="edit({{ $parent->id }})" title="تعديل">
                            <i class="fa fa-edit"></i>
                        </button>
                        <button class="btn btn-danger btn-sm" wire:click="delete({{ $parent->id }})" title="حذف">
                            <i class="fa fa-trash"></i>
                        </button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
