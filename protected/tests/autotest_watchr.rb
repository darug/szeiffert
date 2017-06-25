puts "waiting for class or test files to change..."

watch("models/(.*).php") do |match|
  run_test %{unit/#{match[1]}Test.php}
end

watch("unit/.*Test.php") do |match|
  run_test match[0]
end

def run_test(file)
  clear_console
  unless File.exist?(file)
    puts "#{file} does not exist"
    return
  end
 
  puts "Running #{file}"
  result = `phpunit #{file}`
  puts result
  
  if result.match(/OK/)
    notify "#{file}", "Tests Passed Successfuly", "success.png"
  elsif result.match(/FAILURES\!/)
    notify_failed file, result
  end
 
end

def notify title, msg, img
image='C:\Users\gabor\autotest\images\\' + img
system "C:\growlnotify.com /t:\"#{title}\" /i:\"#{image}\" \"#{msg}\""
end

def notify_failed cmd, result
  puts "RUN"
failed_examples = result.scan(/\n\n\d\)(.*)\n/)
fe_msg = ""
failed_examples.each do |ex|
  ex = ex[0].gsub(/"/, '')
  fe_msg += "#{ex}\n"
end

image='C:\Users\gabor\autotest\images\error.png'
system "C:\growlnotify.com /t:\"#{cmd}\" /i:\"#{image}\" \"Faliures:\n#{fe_msg}\""
end

def clear_console
  puts "\e[H\e[2J"  #clear console
end


