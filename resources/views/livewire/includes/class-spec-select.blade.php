<table class="mt-2">
    <tr>
        <td>
            <select id="classSelect" wire:model="class" class="select">
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
            <select id="specSelect" wire:model="spec" class="select ml-4">

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
        Warrior: ['Arms', 'Fury', 'Protection'],
        Hunter: ['Marksmanship', 'Beast Master', 'Survival'],
        Mage: ['Arcane', 'Frost', 'Fire'],
        Rogue: ['Assassination', 'Outlaw', 'Subtlety'],
        Priest: ['Shadow', 'Discipline', 'Holy'],
        Warlock: ['Demonology', 'Affliction', 'Destruction'],
        Paladin: ['Retribution', 'Holy', 'Protection'],
        Druid: ['Balance', 'Feral', 'Restoration', 'Guardian'],
        Shaman: ['Enhancement', 'Elemental', 'Restoration'],
        Monk: ['Windwalker', 'Mistweaver', 'Brewmaster'],
        "Demon Hunter": ['Havoc', 'Vengeance'],
        "Death Knight": ['Unholy', 'Frost', 'Blood'],
        Evoker: ['Devastation', 'Augmentation', 'Preservation'],
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
