<?php

namespace App\Http\Controllers;

use App\Models\Form;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class FormController extends Controller
{
    //Show Create Form
    public function create() {
        return view('/forms/create');
    }

    // Store Form Data
    public function store(Request $request) {
        $formFields = $request->validate([
            'country' => 'required',
            'age' => ['required'],

            'character_name' => 'required',
            'character_realm' => 'required',
            'class' => 'required',
            'spec' => 'required',

            'battle_net_tag' => 'required',
            'discord_tag' => 'required',

            'ui_vod' => 'required',

            'warcraftlogs' => 'required_without:warcraftlogs_alt',
            'warcraftlogs_alt' => 'required_without:warcraftlogs',
            'raiderio' => 'required_without:raiderio_alt',
            'raiderio_alt' => 'required_without:raiderio',
            'wow_armory' => 'required_without:wow_armory_alt',
            'wow_armory_alt' => 'required_without:wow_armory',

            'plans' => 'required',
            'history' => 'required',
            'pick' => 'required'
            
        ]);

        if($request->get('warcraftlogs')) {
            $formFields['warcraftlogs'] = $request->input('warcraftlogs');
        } elseif($request->get('warcraftlogs_main') && $request->get('warcraftlogs_alt')) {
            $formFields['warcraftlogs'] = $request->input('warcraftlogs_main');
            $formFields['warcraftlogs_alt'] = $request->input('warcraftlogs_alt');
        }

        if($request->get('raiderio')) {
            $formFields['raiderio'] = $request->input('raiderio');
        } elseif($request->get('raiderio_main') && $request->get('raiderio_alt')) {
            $formFields['raiderio'] = $request->input('raiderio_main');
            $formFields['raiderio_alt'] = $request->input('raiderio_alt');
        }

        if($request->get('wow_armory')) {
            $formFields['wow_armory'] = $request->input('wow_armory');
        } elseif($request->get('wow_armory_main') && $request->get('wow_armory_alt')) {
            $formFields['wow_armory'] = $request->input('wow_armory_main');
            $formFields['wow_armory_alt'] = $request->input('wow_armory_alt');
        }

        if($request->get('additional')) {
            $formFields['additional'] = $request->input('additional');
        }

        Form::create($formFields);

        return redirect('/')->with('message', 'Form submitted successfully!');
    }

    // Show Forms on Dashboard Page
    public function show() {
        return view('/forms/show', ['forms' => Form::latest()->filter(request(['tag', 'search']))->paginate(8)]);
    }

    // Show Single Form Page
    public function single(Form $form) {
        return view('/forms/single', ['form'=>$form]);
    }

    // Delete Single Form
    public function destroy(Form $form) {
        $form->delete();
        return redirect('/forms')->with('message', 'Form has been deleted successfully');
    }
}