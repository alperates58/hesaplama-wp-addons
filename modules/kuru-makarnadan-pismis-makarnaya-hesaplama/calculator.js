function hcPastaConvHesapla() {
    const dry = parseFloat(document.getElementById('hc-pasta-dry').value);

    if (isNaN(dry) || dry <= 0) {
        alert('Lütfen kuru makarna miktarını giriniz.');
        return;
    }

    // Makarna piştiğinde ağırlığı yaklaşık 2.5 katına çıkar.
    const cooked = dry * 2.5;
    const servings = dry / 100; // Standart porsiyon 100g kuru makarna

    document.getElementById('hc-pasta-cooked').innerText = cooked.toLocaleString('tr-TR') + ' g';
    document.getElementById('hc-pasta-servings-info').innerText = `Bu miktar yaklaşık ${servings.toFixed(1)} standart porsiyona tekabül eder.`;
    
    document.getElementById('hc-pasta-conv-result').classList.add('visible');
}
