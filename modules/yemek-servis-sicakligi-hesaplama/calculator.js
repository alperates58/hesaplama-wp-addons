function hcServeTempHesapla() {
    const type = document.getElementById('hc-st-type').value;

    let temp = '';
    let info = '';

    const data = {
        soup: { val: '70°C - 80°C', info: 'Çorbalar çok sıcak servis edilmeli ancak ağız yakmamalıdır.' },
        roast: { val: '60°C - 70°C', info: 'Etler piştikten sonra dinlendirilip bu sıcaklıkta servis edilmelidir.' },
        'white-wine': { val: '8°C - 12°C', info: 'Beyaz şaraplar soğuk servis edilmelidir.' },
        'red-wine': { val: '16°C - 18°C', info: 'Kırmızı şaraplar oda sıcaklığından biraz daha serin olmalıdır.' },
        coffee: { val: '65°C - 75°C', info: 'İdeal demleme sonrası içim sıcaklığıdır.' }
    };

    document.getElementById('hc-st-val').innerText = data[type].val;
    document.getElementById('hc-st-info').innerText = data[type].info;
    document.getElementById('hc-serve-temp-result').classList.add('visible');
}
