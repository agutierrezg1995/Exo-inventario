using System;
using System.Diagnostics;
using System.IO;
using System.Threading;

internal static class IniciarNexoInventarios
{
    private static void Main()
    {
        string proyecto = AppDomain.CurrentDomain.BaseDirectory;
        string php = @"C:\xampp\php\php.exe";
        string mysqlInicio = @"C:\xampp\mysql_start.bat";

        if (!File.Exists(php))
        {
            MostrarError("No se encontró PHP en C:\\xampp\\php\\php.exe. Instala XAMPP o corrige la ruta.");
            return;
        }

        try
        {
            if (Process.GetProcessesByName("mysqld").Length == 0 && File.Exists(mysqlInicio))
            {
                Process.Start(new ProcessStartInfo
                {
                    FileName = mysqlInicio,
                    WorkingDirectory = @"C:\xampp",
                    CreateNoWindow = true,
                    WindowStyle = ProcessWindowStyle.Hidden,
                    UseShellExecute = true
                });
                Thread.Sleep(1500);
            }

            Process.Start(new ProcessStartInfo
            {
                FileName = php,
                Arguments = "-d extension=intl spark serve --host localhost --port 8080",
                WorkingDirectory = proyecto,
                CreateNoWindow = false,
                UseShellExecute = true
            });

            Thread.Sleep(1800);
            Process.Start(new ProcessStartInfo
            {
                FileName = "http://localhost:8080",
                UseShellExecute = true
            });
        }
        catch (Exception error)
        {
            MostrarError("No fue posible iniciar Nexo Inventarios:\n\n" + error.Message);
        }
    }

    private static void MostrarError(string mensaje)
    {
        Console.Error.WriteLine(mensaje);
        Console.ReadKey();
    }
}