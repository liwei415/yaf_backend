namespace php rpc.sms.post

struct RequestData {
  1: string ophone,
  2: string iphone,
  3: string content,
  4: string channel,
}

struct Request {
  1: string version,
  2: string method,
  3: string source,
  4: RequestData data,
}

struct Response {
  1: string code,
  2: string msg,
  3: string data,
}

service Post {

   Response run(1:Request request)

}
