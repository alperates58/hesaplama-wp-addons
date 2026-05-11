function hcBesinEtiketiHesapla() {
    const carb = parseFloat(document.getElementById('hc-be-carb').value) || 0;
    const prot = parseFloat(document.getElementById('hc-be-prot').value) || 0;
    const fat = parseFloat(document.getElementById('hc-be-fat').value) || 0;

    // Calorie formula
    const cal = (carb * 4) + (prot * 4) + (fat * 9);

    // Daily Values (based on 2000 kcal diet)
    // Carb: 275g, Protein: 50g, Fat: 78g (approximate standard DV)
    const dvCarb = (carb / 275) * 100;
    const dvProt = (prot / 50) * 100;
    const dvFat = (fat / 78) * 100;

    document.getElementById('hc-be-res-cal').innerText = Math.round(cal).toLocaleString('tr-TR') + ' kcal';
    document.getElementById('hc-be-dv-carb').innerText = 'Karbonhidrat: %' + Math.round(dvCarb);
    document.getElementById('hc-be-dv-prot').innerText = 'Protein: %' + Math.round(dvProt);
    document.getElementById('hc-be-dv-fat').innerText = 'Yağ: %' + Math.round(dvFat);
    
    document.getElementById('hc-be-result').classList.add('visible');
}
