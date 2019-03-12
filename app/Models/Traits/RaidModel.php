<?php

namespace App\Models\Traits;

trait RaidModel
{
    public function scopeSort($query)
    {
        return $query->orderBy('created_at', 'desc');
    }

    public static function prepare($request, $identifier = 'id')
    {
        $record = new static;

        if ($request->has($identifier) && $request->get($identifier) != null && $request->get($identifier) != 0) {
            $record = static::find($request->get($identifier));
        }

        return $record;
    }

    public function postSave($request, $identifier = 'id')
    {
        # code didieu
    }

    public static function saveData($request, $identifier = 'id')
    {
        $record = static::prepare($request, $identifier);
        $record->fillData($request);
        $record->save();

        $record->postSave($request, $identifier);

        return $record;
    }

    public function fillData($request)
    {
        $this->fill($request->all());
    }

    public static function getSorted()
    {
        return static::sort()->get();
    }

    public static function generateCode()
    {
        if (\Schema::hasColumn(with(new static )->getTable(), 'kode')) {
            $last = static::orderBy('kode', 'desc')->first();
            $kode = (!is_null($last) && $k = $last->kode) ? intval($last->kode) : 0;

            return str_pad($kode + 1, 5, "0", STR_PAD_LEFT);
        }

        return "";
    }

    public static function generateNomor()
    {
        if (\Schema::hasColumn(with(new static )->getTable(), 'nomor')) {
            $now = date("Ymd");
            $last = static::where('nomor','like', '%' . $now . '%')->orderBy('nomor', 'desc')->first();
            $nomor = (!is_null($last) && $k = $last->nomor) ? substr($last->nomor, 8) : 0;
            $nomor = (int) $nomor;
            $nomor = intval($nomor);
            $lastnumber = str_pad($nomor + 1, 5, "0", STR_PAD_LEFT);
            return $now.''.$lastnumber;
        }

        return "";
    }
}
