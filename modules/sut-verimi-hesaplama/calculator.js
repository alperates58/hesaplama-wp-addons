function hcSutVerimiHesapla() {
    const totalMilk = parseFloat(document.getElementById('hc-sv-total').value);
    const animalCount = parseInt(document.getElementById('hc-sv-count').value);

    if (!totalMilk || !animalCount) {
        alert('Lütfen tüm alanları doldurunuz.');
        return;
    }

    const average = totalMilk / animalCount;

    const resVal = document.getElementById('hc-sv-res-val');
    resVal.innerText = average.toFixed(2).toLocaleString('tr-TR');

    document.getElementById('hc-sut-verimi-result').classList.add('visible');
}
