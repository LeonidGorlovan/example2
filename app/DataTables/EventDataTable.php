<?php

namespace App\DataTables;

use App\Models\Event;
use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Database\Eloquent\Builder;
use Yajra\DataTables\DataTableAbstract;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class EventDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return DataTableAbstract
     */
    public function dataTable(mixed $query): DataTableAbstract
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('action', 'event.action')
            ->filterColumn('venue_name', function($query, $keyword) {
                $sql = "venues.name like ?";
                $query->whereRaw($sql, ["%{$keyword}%"]);
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param Event $model
     * @return Builder
     */
    public function query(Event $model): Builder
    {
        return $model->newQuery()
            ->select(['events.*', 'venues.name as venue_name'])
            ->join('venues', 'events.venue_id', '=', 'venues.id');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): \Yajra\DataTables\Html\Builder
    {
        return $this->builder()
                    ->setTableId('event-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(1)
                    ->buttons(
                        Button::make('reset'),
                        Button::make('reload')
                    );
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns(): array
    {
        return [
            Column::make('id'),
            Column::make('venue_name'),
            Column::make('name'),
            Column::make('event_date'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(120)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'Event_' . date('YmdHis');
    }
}
