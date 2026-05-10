function hcCountingAddInput() {
    const container = document.getElementById('hc-count-inputs');
    const count = container.getElementsByClassName('hc-form-group').length + 1;
    const div = document.createElement('div');
    div.className = 'hc-form-group';
    div.innerHTML = `<label>${count}. Aşama Seçenek Sayısı:</label><input type="number" class="hc-c-val" placeholder="5">`;
    container.appendChild(div);
}

function hcCountingHesapla() {
    const inputs = document.getElementsByClassName('hc-c-val');
    let product = 1;
    let found = false;
    
    for (let input of inputs) {
        let val = parseInt(input.value);
        if (!isNaN(val)) {
            product *= val;
            found = true;
        }
    }

    if (!found) {
        alert('Lütfen en az bir aşama giriniz.');
        return;
    }

    document.getElementById('hc-c-res-val').innerText = product.toLocaleString('tr-TR');
    document.getElementById('hc-counting-result').classList.add('visible');
}
