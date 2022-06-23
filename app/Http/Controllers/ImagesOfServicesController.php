<?php

namespace App\Http\Controllers;
use App\Models\ImagesOfService;
use App\Services\FileService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ImagesOfServicesController extends Controller
{
    public function destroy(ImagesOfService $imagesOfService)
    {
        if (Gate::allows('admin')) {

            FileService::deleteImgService($imagesOfService);

            $service = $imagesOfService->service_id;
            $imgService = ImagesOfService::where('service_id', $service)->get()->count();

            if ($imagesOfService['img'] == 'services/default.jpg' && $imgService == 1) {
                return redirect()->route('services.edit', $service)
                    ->with('errors', 'Изображение по умолчание невозможно удалить, если оно одно');
            } elseif ($imagesOfService['img'] == 'services/default.jpg' && $imgService > 1) {
                $imagesOfService->delete();
            } else {
                $imagesOfService->delete();
            }

            $imgService = ImagesOfService::where('service_id', $service)->get()->count();

            if ($imgService == 0) {
                ImagesOfService::create([
                    'img' => 'services/default.jpg',
                    'service_id' => $service,
                ]);
            }

            return redirect()->route('services.edit', $service)
                ->with('success', 'Данные успешно удалены');

        }

        return redirect()->route('admin.servicesAdminView')
            ->with('errors', 'Возникла ошибка');
    }
}
