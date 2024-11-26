<?php

namespace App\Pitche\Domain\Services;

use App\Infrastructure\Domain\Payloads\GenericPayload;
use App\Infrastructure\Domain\Services\Service;
use App\Pitche\Domain\Models\Pitche;
use App\Pitche\Domain\Traits\SlotsTrait;

class ListPitcheSlotsService extends Service
{
    use SlotsTrait;

    public $pitche;
    public function __construct(Pitche $pitche)
    {
        $this->pitche = $pitche;
    }

    /*
     * Method get opening & closing time for specific pitche.
     * use slot trait to render piteche slots avaiable
     */

    public function handle($data = [], $id = null)
    {
        try {
            $pitche = Pitche::findOrFail($id);

        } catch (\Exception $ex) {

            return new GenericPayload($ex->getMessage(), 422);
        }

        $slots = $this->getSlots($data, $id); // --- Period could be [60, 90]

        return new GenericPayload($slots, 204);
    }

}
