<?php

namespace App\Admin\Controllers;

use App\Jobs\DispatchSendEmailJob;
use App\Models\Work;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class WorksController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new Work(), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('name');
            $grid->column('title');
            $grid->column('from')->display(function ($value) {
                return Work::$fromNameMap[$value];
            });
            $grid->column('work')->display(function ($value) {
                return "{$this->work_completed} / {$this->work_count}";
            });
            $grid->column('is_test')->display(function ($value) {
                return $this->is_test ? '是' : '否';
            });
            $grid->column('send_time');
        
            $grid->toolsWithOutline(false);
            $grid->disableViewButton();

            $grid->filter(function (Grid\Filter $filter) {
                $filter->panel();
                $filter->equal('id');
        
            });
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Form::make(new Work(), function (Form $form) {
            $form->display('id');
            $form->text('name')->rules('required');
            $form->text('title')->rules('required|string');
            $form->editor('content')->rules('required');
            $form->radio('from')->options(['EYOUGAME' => 'EYOUGAME', '1618play' => '1618play'])->default(Work::FROM_EYOU);
            $form->radio('is_test')->options([1 => '是',0 => '否'])->default(0);
            $form->textarea('test_email');
            $form->file('receiver_file')->uniqueName()->autoUpload()->rules('file');
            $form->datetime('send_time');

            $form->disableResetButton();
            $form->disableViewCheck();
            $form->disableEditingCheck();
            $form->disableCreatingCheck();

            $form->saved(function (Form $form) {
                if ($form->isCreating()) {
                    $id = $form->getKey();
                } else {
                    $id = $form->model()->id;
                }
                $work = Work::find($id);
                dispatch(new DispatchSendEmailJob($work));
            });
        });
    }
}
