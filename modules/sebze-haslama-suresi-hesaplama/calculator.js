function hcVegBoilHesapla() {
    const time = document.getElementById('hc-vb-type').value;

    document.getElementById('hc-vb-val').innerText = time + ' Dakika';
    document.getElementById('hc-vb-info').innerText = 'Süre su kaynadıktan sonra sebzelerin eklenmesiyle başlar. Haşlama sonrası şoklama (buzlu su) önerilir.';
    
    document.getElementById('hc-veg-boil-result').classList.add('visible');
}
