from fbchat import Client
from fbchat.models import *

client=Client('thumma.palakrai@hotmail.com','Mix@27451622') # ลงชื่อเข้าใช้งาน facebook

friend_id="100003082631040"
group_id="2770062866375119"
client.send(Message(text="สวัสดีเพื่อนๆเราคือบอทนะ"),thread_id=group_id,thread_type=ThreadType.GROUP)
client.send(Message(emoji_size=EmojiSize.LARGE),thread_id=group_id,thread_type=ThreadType.GROUP)
client.logout()
