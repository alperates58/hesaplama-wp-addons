function hcWineGlassHesapla() {
    const bottle = parseFloat(document.getElementById('hc-wg-bottle').value);
    const glass = parseFloat(document.getElementById('hc-wg-glass').value);

    const portions = bottle / glass;

    document.getElementById('hc-wg-val').innerText = portions.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' Kadeh';
    document.getElementById('hc-wg-info').innerText = `Bir şişeden yaklaşık ${Math.floor(portions)} tam kadeh servis edilebilir.`;
    
    document.getElementById('hc-wine-glass-result').classList.add('visible');
}
