document.getElementById("okButton").addEventListener("click", function() {
    var nama = document.getElementById("nama").textContent;
    var jumlah = document.getElementById("nim").textContent;

    var otherTabContent = "Nama: " + nama + "\nJumlah Pilihan: " + jumlah;
    alert(otherTabContent);
});



function showForm() {
    document.getElementById("clickHereButton").style.display = "none";
    document.getElementById("inputForm").style.display = "block";
}

function submitSelection() {
    // Lakukan tindakan saat formulir disubmit
}

function generateOptions() {
    var nama = document.getElementById('nama').value;
    var jumlah = parseInt(document.getElementById('jumlah').value);

    var optionsContainer = document.getElementById('optionsContainer');
    optionsContainer.innerHTML = '';

    for (var i = 1; i <= jumlah; i++) {
        var optionLabel = document.createElement('label');
        optionLabel.textContent = 'Pilihan ' + i + ' : ';
        var optionInput = document.createElement('input');
        optionInput.setAttribute('type', 'text');
        optionInput.setAttribute('class', 'option');
        optionInput.setAttribute('placeholder', 'Teks Pilihan ' + i);
        optionsContainer.appendChild(optionLabel);
        optionsContainer.appendChild(optionInput);
    }

    var submitButton = document.getElementById('submitButton');
    submitButton.style.display = 'block';
    submitButton.textContent = 'Submit Pilihan';
    submitButton.setAttribute('onclick', 'submitOptions()');
}

function submitSelection() {
    var selectedOptions = [];
    var optionInputs = document.querySelectorAll('.option');
    optionInputs.forEach(function(input) {
        selectedOptions.push(input.value);
    });

    var optionsContainer = document.getElementById('optionsContainer');
    optionsContainer.innerHTML = '';

    var radioOption = document.createElement('div');
    radioOption.innerHTML = '<label>Pilihan : </label>';

    selectedOptions.forEach(function(option, index) {
        var radioInput = document.createElement('input');
        radioInput.setAttribute('type', 'radio');
        radioInput.setAttribute('name', 'option');
        radioInput.setAttribute('value', option);
        var label = document.createElement('label');
        label.textContent = option;

        radioOption.appendChild(radioInput);
        radioOption.appendChild(label);
        if (index !== selectedOptions.length - 1) {
            radioOption.appendChild(document.createElement('br'));
        }
    });

    var dropDownOption = document.createElement('select');
    dropDownOption.innerHTML = '<option selected disabled hidden>Pilih satu</option>';
    selectedOptions.forEach(function(option) {
        var optionElement = document.createElement('option');
        optionElement.value = option;
        optionElement.text = option;
        dropDownOption.appendChild(optionElement);
    });

    optionsContainer.appendChild(radioOption);
    optionsContainer.appendChild(document.createElement('br'));
    optionsContainer.appendChild(dropDownOption);

    var submitButton = document.getElementById('submitButton');
    submitButton.textContent = 'Submit';
    submitButton.setAttribute('onclick', 'submitSelection()');
}

function submitSelection() {
    var nama = document.getElementById('nama').value;
    var jumlah = parseInt(document.getElementById('jumlah').value);

    var selectedOption = '';
    var radioButtons = document.getElementsByName('option');
    radioButtons.forEach(function(button) {
        if (button.checked) {
            selectedOption = button.value;
        }
    });

    if (selectedOption === '') {
        alert('Pilih salah satu opsi!');
        return;
    }

    var finalOutput = document.getElementById('finalOutput');
    finalOutput.style.display = 'block';
    finalOutput.textContent = 'Hallo, nama saya ' + nama + ', saya mempunyai sejumlah ' + jumlah + ' pilihan yaitu ' + selectedOption + ', dan saya memilih ' + selectedOption;
}