<table class="mt-2">
    <tr>
        <td>
            <select id="classSelect" wire:model="characterForm.class" class="select">
                <option selected>Select a class</option>
                <option value="Warrior">Warrior</option>
                <option value="Hunter">Hunter</option>
                <option value="Mage">Mage</option>
                <option value="Rogue">Rogue</option>
                <option value="Priest">Priest</option>
                <option value="Warlock">Warlock</option>
                <option value="Paladin">Paladin</option>
                <option value="Druid">Druid</option>
                <option value="Shaman">Shaman</option>
                <option value="Monk">Monk</option>
                <option value="Demon Hunter">Demon Hunter</option>
                <option value="Death Knight">Death Knight</option>
                <option value="Evoker">Evoker</option>
            </select>
        </td>
        <td>
            <select id="specSelect" wire:model="characterForm.spec" class="select ml-4">

            </select>
        </td>
    </tr>
</table>

<script>
    // Get references to the select elements
    const classSelect = document.getElementById('classSelect');
    const specSelect = document.getElementById('specSelect');

    // Define options for the second select based on the first select
    const options = {
        Warrior: ['Select spec', 'Arms', 'Fury', 'Protection'],
        Hunter: ['Select spec', 'Marksmanship', 'Beast Master', 'Survival'],
        Mage: ['Select spec', 'Arcane', 'Frost', 'Fire'],
        Rogue: ['Select spec', 'Assassination', 'Outlaw', 'Subtlety'],
        Priest: ['Select spec', 'Shadow', 'Discipline', 'Holy'],
        Warlock: ['Select spec', 'Demonology', 'Affliction', 'Destruction'],
        Paladin: ['Select spec', 'Retribution', 'Holy', 'Protection'],
        Druid: ['Select spec', 'Balance', 'Feral', 'Restoration', 'Guardian'],
        Shaman: ['Select spec', 'Enhancement', 'Elemental', 'Restoration'],
        Monk: ['Select spec', 'Windwalker', 'Mistweaver', 'Brewmaster'],
        "Demon Hunter": ['Select spec', 'Havoc', 'Vengeance'],
        "Death Knight": ['Select spec', 'Unholy', 'Frost', 'Blood'],
        Evoker: ['Select spec', 'Devastation', 'Augmentation', 'Preservation'],
    };

    // Function to update the options of the second select
    function updateSpecSelect() {
        const selectedClass = classSelect.value;
        const classSpecs = options[selectedClass] || [];

        // Clear existing options
        specSelect.innerHTML = '';

        // Add new options
        classSpecs.forEach(specs => {
            const option = document.createElement('option');
            option.value = specs;
            option.text = specs;
            specSelect.appendChild(option);
        });
    }

    // Add an event listener to the first select to update the second select
    classSelect.addEventListener('change', updateSpecSelect);

    // Initialize the second select based on the initial value of the first select
    updateSpecSelect();
</script>
