<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\PendudukRequest as StoreRequest;
use App\Http\Requests\PendudukRequest as UpdateRequest;
use Backpack\CRUD\CrudPanel;

/**
 * Class PendudukCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class PendudukCrudController extends CrudController
{
    public function setup() // public function __construct() 
    {
        // parent::__construct();
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Penduduk');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/penduduk');
        $this->crud->setEntityNameStrings('penduduk', 'penduduk');

        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */
        //ADD COLUMN NUMBER INDEX
        $this->crud->addColumn([
            'name' => 'row_number',
            'type' => 'row_number',
            'label' => 'No',
            'orderable' => false,
        ])->makeFirstColumn();

        // // ADD COLUMN
        // $this->crud->addColumn([   // Select
        //     'label' => "ID", //table column heading
        //     'name' => 'id', // the db column for the foreign key
        // ]);

        // ADD COLUMN
        $this->crud->addColumn([   // Select
            'label' => "Nama Desa", //table column heading
            'type' => 'select',
            'name' => 'desa_id', // the db column for the foreign key
            'entity' => 'desa', // the method that defines the relationship in your Model
            'attribute' => 'nama_desa', // foreign key attribute that is shown to user
            'model' => "App\Models\Desa", // foreign key model
        ]);

        // ADD FIELD------------------------------------------------------------
        $this->crud->addField([   // Select
            'label' => "Nama Desa",
            'type' => 'select',
            'name' => 'desa_id', // the db column for the foreign key
            'entity' => 'desa', // the method that defines the relationship in your Model
            'attribute' => 'nama_desa', // foreign key attribute that is shown to user
            'model' => "App\Models\Desa", // foreign key model
        ]);
        

        

        // TODO: remove setFromDb() and manually define Fields and Columns
        $this->crud->setFromDb();

        // add asterisk for fields that are required in PendudukRequest
        $this->crud->setRequiredFields(StoreRequest::class, 'create');
        $this->crud->setRequiredFields(UpdateRequest::class, 'edit');
    }

    public function store(StoreRequest $request)
    {
        // your additional operations before save here
        $redirect_location = parent::storeCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }

    public function update(UpdateRequest $request)
    {
        // your additional operations before save here
        $redirect_location = parent::updateCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }
}
