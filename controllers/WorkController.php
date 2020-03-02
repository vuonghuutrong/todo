<?php
use Cores\Controller;
use Cores\View;
use Model\Work;

class WorkController extends Controller
{
    public function create()
    {
        return View::make('work/create');
    }

    public function store($request)
    {
        $workname = $request['name'];
        $starting_date = $request['starting_date'];
        $ending_date = $request['ending_date'];
        if (empty($workname) || empty($starting_date) || empty($ending_date)) {
            die('Miss params');
        } else {
            $data = [
                'name' => $workname,
                'starting_date' => $starting_date,
                'ending_date' => $ending_date
            ];
            Work::insert($data);
            return self::redirect('/');
        }
    }

    public function edit($id)
    {
        $work = Work::find($id);
        return View::make('work/edit', $work);
    }

    public function update($id, $request)
    {
        $workname = $request['name'];
        $starting_date = $request['starting_date'];
        $ending_date = $request['ending_date'];
        $status = $request['status'];
        if (empty($workname) || empty($starting_date) || empty($ending_date)) {
            die('Miss params');
        } else {
            $data = [
                'name' => $workname,
                'starting_date' => $starting_date,
                'ending_date' => $ending_date,
                'status' => $status
            ];
            Work::update($id, $data);
            return self::redirect('/');
        }
    }

    public function delete($id)
    {
        Work::delete($id);
        return self::redirect('/');
    }
}
