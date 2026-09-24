## Laravel Local Timezone Setter Trait:
A clean and reusable Laravel Trait to store local time into database timestamps (created_at and updated_at). It lets you to eliminate the need to write repetitive code in your models.
The trait is ideal for single timezone users, crucial for financial institutions (Banks/Agents/Brokers).

## Features:
* DRY method (Don't Repeat Yourself): No need to manually write repetitive code in your eloquent models.
* Localized Database Storage: Reflects your database with local time, extremely important for audit purpose.
* Plug & Play: Requires only a single line of code inside your Eloquent models to take effect.

## Installation & Usage:
1. Create the Trait File
Copy the file inside the app/Traits/ directory of your Laravel application

2. Implement in Your Models
Import the trait inside Eloquent models where you want localized timestamps:

```<?php

namespace App\Models;

use App\Traits\LocalTimezoneTrait; // Import the trait
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use LocalTimezoneTrait; // Apply the trait

    // Rest code goes here...
}
```
