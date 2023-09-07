<table class="mt-2">
    <tr>
        <td>
            <select id="classSelect" name="class" class="select">

            </select>
        </td>
        <td>
            <select id="specSelect" name="spec" class="select ml-4">

            </select>
        </td>
    </tr>
</table>


<script> 
    const classes = [{
            id: 1,
            name: 'Warrior'
        },
        {
            id: 2,
            name: 'Hunter'
        },
        {
            id: 3,
            name: 'Mage'
        },
        {
            id: 4,
            name: 'Rogue'
        },
        {
            id: 5,
            name: 'Priest'
        },
        {
            id: 6,
            name: 'Warlock'
        },
        {
            id: 7,
            name: 'Paladin'
        },
        {
            id: 8,
            name: 'Druid'
        },
        {
            id: 9,
            name: 'Shaman'
        },
        {
            id: 10,
            name: 'Monk'
        },
        {
            id: 11,
            name: 'Demon Hunter'
        },
        {
            id: 12,
            name: 'Death Knight'
        },
        {
            id: 13,
            name: 'Evoker'
        },
    ]
    const specs = [{
            id: 1,
            name: 'Arms',
            classId: "Warrior"
        },
        {
            id: 2,
            name: 'Fury',
            classId: "Warrior"
        },
        {
            id: 3,
            name: 'Protection',
            classId: "Warrior"
        },
        {
            id: 4,
            name: 'Marksmanship',
            classId: 'Hunter'
        },
        {
            id: 5,
            name: 'Beast Master',
            classId: 'Hunter'
        },
        {
            id: 6,
            name: 'Survival',
            classId: 'Hunter'
        },
        {
            id: 7,
            name: 'Arcane',
            classId: "Mage"
        },
        {
            id: 8,
            name: 'Frost',
            classId: "Mage"
        },
        {
            id: 9,
            name: 'Fire',
            classId: "Mage"
        },
        {
            id: 10,
            name: 'Assassination',
            classId: "Rogue"
        },
        {
            id: 11,
            name: 'Outlaw',
            classId: "Rogue"
        },
        {
            id: 12,
            name: 'Subtlety',
            classId: "Rogue"
        },
        {
            id: 13,
            name: 'Shadow',
            classId: "Priest"
        },
        {
            id: 14,
            name: 'Discipline',
            classId: "Priest"
        },
        {
            id: 15,
            name: 'Holy',
            classId: "Priest"
        },
        {
            id: 16,
            name: 'Demonology',
            classId: "Warlock"
        },
        {
            id: 17,
            name: 'Affliction',
            classId: "Warlock"
        },
        {
            id: 18,
            name: 'Destruction',
            classId: "Warlock"
        },
        {
            id: 19,
            name: 'Retribution',
            classId: "Paladin"
        },
        {
            id: 20,
            name: 'Holy',
            classId: "Paladin"
        },
        {
            id: 21,
            name: 'Protection',
            classId: "Paladin"
        },
        {
            id: 22,
            name: 'Balance',
            classId: "Druid"
        },
        {
            id: 23,
            name: 'Feral',
            classId: "Druid"
        },
        {
            id: 24,
            name: 'Restoration',
            classId: "Druid"
        },
        {
            id: 25,
            name: 'Guardian',
            classId: "Druid"
        },
        {
            id: 26,
            name: 'Enhancement',
            classId: "Shaman"
        },
        {
            id: 27,
            name: 'Elemental',
            classId: "Shaman"
        },
        {
            id: 28,
            name: 'Restoration',
            classId: "Shaman"
        },
        {
            id: 30,
            name: 'Windwalker',
            classId: "Monk"
        },
        {
            id: 31,
            name: 'Mistweaver',
            classId: "Monk"
        },
        {
            id: 32,
            name: 'Brewmaster',
            classId: "Monk"
        },
        {
            id: 33,
            name: 'Havoc',
            classId: "Demon Hunter"
        },
        {
            id: 34,
            name: 'Vengeance',
            classId: "Demon Hunter"
        },
        {
            id: 35,
            name: 'Unholy',
            classId: "Death Knight"
        },
        {
            id: 36,
            name: 'Frost',
            classId: "Death Knight"
        },
        {
            id: 37,
            name: 'Blood',
            classId: "Death Knight"
        },
        {
            id: 38,
            name: 'Devastation',
            classId: "Evoker"
        },
        {
            id: 39,
            name: 'Augmentation',
            classId: "Evoker"
        },
        {
            id: 40,
            name: 'Preservation',
            classId: "Evoker"
        },
    ]


    function renderClasses() {
        const select = document.querySelector('#classSelect')
        const optionsHTML = classes.map(item => `<option value="${item.name}">${item.name}</option>`)
        select.innerHTML = optionsHTML.join('');
    }

    function renderSpecs(specs) {
        const select = document.querySelector('#specSelect');
        const optionsHTML = specs.map(spec => `<option value="${spec.name}">${spec.name}</option>`);
        select.innerHTML = optionsHTML.join('');
    }

    renderClasses();
    renderSpecs(specs);

    //const selectedClassId = 1
    //const selectedClassSpecs = specs.filter(spec => spec.classId === selectedClassId)

    document.querySelector('#classSelect').addEventListener('change', event => {
        const selectedClassId = event.target.value;
        // const selectedClassSpecs = selectedClassId ? specs.filter(spec => spec.classId === parseInt(selectedClassId)) : specs;
        const selectedClassSpecs = selectedClassId ? specs.filter(spec => spec.classId ===
            selectedClassId) : specs;
        renderSpecs(selectedClassSpecs);
    });
</script>
