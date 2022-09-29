<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ParutionRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use http\Url;

/**
 * Class ParutionCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ParutionCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Parution::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/parution');
        CRUD::setEntityNameStrings('parution', 'parutions');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupShowOperation()
    {
        CRUD::column('journee');
        CRUD::column('prix');
        $this->crud->addColumn([
            'type'=>'model_function',
            'label'     => 'Total achats',
            'function_name'=>'totalAchate'

            ]);
    }

    protected function setupListOperation()
    {
        CRUD::column('journee');
        CRUD::column('prix');
        $this->crud->addColumn([
            // Select
            'label'     => 'Category',
            'wrapper'   => [
                // 'element' => 'a', // the element will default to "a" so you can skip it here
                'href' => function ($crud, $column, $entry) {
                    return backpack_url('appel/'.$entry->id.'/show');
                },
                // 'target' => '_blank',
                'text'=>'label'
                // 'class' => 'some-class',
            ],
        ]);
        $this->crud->addColumn([
            'name'     => 'my_custom_html',
            'label'    => 'Custom HTML',
            'type'     => 'custom_html',
            'value'    => '<a href="'.route('ajouter-appels-sur-parution',['parution'=>1]).'" class="">Ajouter Appel</a>',

            // OPTIONALS
            // 'escaped' => true // echo using {{ }} instead of {!! !!}
        ]); $this->crud->addColumn([
            'name'     => 'a_custom_html',
            'label'    => 'Custom HTML',
            'type'     => 'custom_html',
            'value'    => '<a href="'.route('ajouter-avis-sur-parution',['parution'=>1]).'" class="">Ajouter Avis</a>',

            // OPTIONALS
            // 'escaped' => true // echo using {{ }} instead of {!! !!}
        ]); $this->crud->addColumn([
        // relationship count
        'name'      => 'appels', // name of relationship method in the model
        'type'      => 'relationship_count',
        'label'     => 'N° Appels', // Table column heading
        // OPTIONAL
         'suffix' => ' appels', // to show "123 tags" instead of "123 items"
    ],);

        /**
         * Columns can be defined using the fluent syntax or array syntax:
         * - CRUD::column('price')->type('number');
         * - CRUD::addColumn(['name' => 'price', 'type' => 'number']);
         */
    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(ParutionRequest::class);

        CRUD::field('journee');
        CRUD::field('prix');

        /**
         * Fields can be defined using the fluent syntax or array syntax:
         * - CRUD::field('price')->type('number');
         * - CRUD::addField(['name' => 'price', 'type' => 'number']));
         */
    }

    /**
     * Define what happens when the Update operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
