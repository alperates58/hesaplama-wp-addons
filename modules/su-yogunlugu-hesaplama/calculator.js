function hcSuYoğunluguHesapla() {
    var T = parseFloat(document.getElementById('hc-sy-temp').value); // °C
    var S = parseFloat(document.getElementById('hc-sy-sal').value);  // ppt (g/kg)

    if (isNaN(T) || T < -10 || T > 100) {
        alert('Lütfen -10 ile 100 °C arasında geçerli bir sıcaklık değeri girin.');
        return;
    }
    if (isNaN(S) || S < 0 || S > 45) {
        alert('Lütfen 0 ile 45 ppt (g/kg) arasında geçerli bir tuzluluk değeri girin.');
        return;
    }

    // UNESCO 1981 / Millero density equation simplified for 1 atm
    // Fresh water density at 1 atm
    var rho0 = 999.842594 + 
               6.793952e-2 * T - 
               9.095290e-3 * Math.pow(T, 2) + 
               1.001685e-4 * Math.pow(T, 3) - 
               1.120083e-6 * Math.pow(T, 4) + 
               6.536332e-9 * Math.pow(T, 5);

    // Salinity terms
    var A = 0.824493 - 4.0899e-3 * T + 7.6438e-5 * Math.pow(T, 2) - 8.2467e-7 * Math.pow(T, 3) + 5.3875e-9 * Math.pow(T, 4);
    var B = -5.72466e-3 + 1.0227e-4 * T - 1.6546e-6 * Math.pow(T, 2);
    var C = 4.8314e-4;

    var rho = rho0 + A * S + B * Math.pow(S, 1.5) + C * Math.pow(S, 2);

    var rhoGcm3 = rho / 1000;
    
    // Specific gravity relative to pure water at 4°C (~1000 kg/m3)
    var sg = rho / 1000;

    document.getElementById('hc-sy-res-kgm3').innerText = rho.toLocaleString('tr-TR', { maximumFractionDigits: 3 }) + ' kg/m³';
    document.getElementById('hc-sy-res-gcm3').innerText = rhoGcm3.toLocaleString('tr-TR', { maximumFractionDigits: 6 }) + ' g/cm³';
    document.getElementById('hc-sy-res-sg').innerText = sg.toLocaleString('tr-TR', { maximumFractionDigits: 4 });

    var desc = T.toLocaleString('tr-TR') + ' °C sıcaklıkta ve %' + S.toLocaleString('tr-TR') + ' tuzluluk oranına sahip suyun yoğunluğu tam olarak ' + rho.toLocaleString('tr-TR', { maximumFractionDigits: 3 }) + ' kg/m³ olarak hesaplanmıştır. Saf suyun yoğunluğu yaklaşık 4 °C sıcaklıkta en yüksek seviyesine (999,97 kg/m³) ulaşır.';
    document.getElementById('hc-sy-desc').innerText = desc;

    document.getElementById('hc-su-yogunlugu-hesaplama-result').classList.add('visible');
}
