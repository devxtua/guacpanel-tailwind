<?php
namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;

class KanbanController extends Controller
{
public function index()
{
$columns = [
    [
        'id' => 'todo',
        'name' => 'New Orders',
        'color' => 'bg-blue-500 text-white',
        'tasks' => [
            ['id' => 1, 'name' => 'MDF doors', 'business' => 'GIMMLET LTD'],
            ['id' => 2, 'name' => 'Custom Shelves', 'business' => 'WoodWorks Ltd.'],
            ['id' => 3, 'name' => 'Desk panels', 'business' => 'Interior Pro'],
        ],
    ],
    [
        'id' => 'edging',
        'name' => 'Edging Tapes',
        'color' => 'bg-yellow-400 text-black',
        'tasks' => [
            ['id' => 4, 'name' => 'Tape for doors', 'business' => 'EdgePro'],
            ['id' => 5, 'name' => 'PVC tape order', 'business' => 'TrimMax'],
        ],
    ],
    [
        'id' => 'fluted',
        'name' => 'MDF Fluted Panels',
        'color' => 'bg-purple-500 text-white',
        'tasks' => [
            ['id' => 6, 'name' => 'Vertical slats', 'business' => 'PanelMaster'],
            ['id' => 7, 'name' => 'Textured panels', 'business' => 'DecoCraft'],
        ],
    ],
    [
        'id' => 'cnc',
        'name' => 'CNC Stock',
        'color' => 'bg-green-500 text-white',
        'tasks' => [
            ['id' => 8, 'name' => 'Egger cuts', 'business' => 'Oakwood Interior Solutions'],
            ['id' => 9, 'name' => 'Pre-cut modules', 'business' => 'CNCWorks'],
            ['id' => 10, 'name' => 'Cabinet sides', 'business' => 'MDFx'],
            ['id' => 11, 'name' => 'Router pass test', 'business' => 'ToolTech'],
        ],
    ],
    [
        'id' => 'dispatched',
        'name' => 'Dispatched',
        'color' => 'bg-indigo-500 text-white',
        'tasks' => [
            ['id' => 12, 'name' => 'Delivered to GIMMLET LTD', 'business' => 'GIMMLET LTD'],
            ['id' => 13, 'name' => 'Egger order shipped', 'business' => 'Oakwood Interior Solutions'],
        ],
    ],
        [
        'id' => 'fluted',
        'name' => 'MDF Fluted Panels',
        'color' => 'bg-purple-500 text-white',
        'tasks' => [
            ['id' => 6, 'name' => 'Vertical slats', 'business' => 'PanelMaster'],
            ['id' => 7, 'name' => 'Textured panels', 'business' => 'DecoCraft'],
        ],
    ],
    [
        'id' => 'cnc',
        'name' => 'CNC Stock',
        'color' => 'bg-green-500 text-white',
        'tasks' => [
            ['id' => 8, 'name' => 'Egger cuts', 'business' => 'Oakwood Interior Solutions'],
            ['id' => 9, 'name' => 'Pre-cut modules', 'business' => 'CNCWorks'],
            ['id' => 10, 'name' => 'Cabinet sides', 'business' => 'MDFx'],
            ['id' => 11, 'name' => 'Router pass test', 'business' => 'ToolTech'],
        ],
    ],
    [
        'id' => 'dispatched',
        'name' => 'Dispatched',
        'color' => 'bg-indigo-500 text-white',
        'tasks' => [
            ['id' => 12, 'name' => 'Delivered to GIMMLET LTD', 'business' => 'GIMMLET LTD'],
            ['id' => 13, 'name' => 'Egger order shipped', 'business' => 'Oakwood Interior Solutions'],
        ],
    ],
];


    return Inertia::render('KanbanPage', [
        'columns' => $columns,
    ]);
}


}
