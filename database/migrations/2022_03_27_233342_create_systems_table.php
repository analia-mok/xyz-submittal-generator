<?php

use App\Models\BarrierType;
use App\Models\FRating;
use App\Models\Penetrant;
use App\Models\SystemType;
use App\Models\TRating;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('systems', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->text('description')->nullable();

            $table->boolean('l_rating')->default(false);
            $table->boolean('w_rating')->default(false);
            $table->boolean('mold_mildew_resistance')->default(false);
            $table->string('testing_authority')->nullable();

            // Relationships.
            $table->foreignIdFor(BarrierType::class)->nullable();
            $table->foreignIdFor(Penetrant::class)->nullable();
            $table->foreignIdFor(SystemType::class)->nullable();
            $table->foreignIdFor(FRating::class)->nullable();
            $table->foreignIdFor(TRating::class)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('systems');
    }
};
